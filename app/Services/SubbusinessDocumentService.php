<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use RuntimeException;

class SubBusinessDocumentService
{
    /**
     * Mengambil konfigurasi tenant (sub-bisnis).
     */
    public function getTenantConfig(string $tenant): array
    {
        $config = config("sub_businesses.tenants.{$tenant}");

        if (!$config) {
            throw new RuntimeException("Konfigurasi sub-bisnis '{$tenant}' tidak ditemukan.");
        }

        return $config;
    }

    /**
     * Membangun scoped filesystem disk yang terkunci hanya pada direktori dokumen tertentu.
     */
    public function getScopedDisk(string $tenant, string $pathKey): Filesystem
    {
        $config = $this->getTenantConfig($tenant);
        $relativePath = $config['paths'][$pathKey] ?? null;

        if (!$relativePath) {
            throw new RuntimeException("Path key '{$pathKey}' tidak terdaftar untuk sub-bisnis '{$tenant}'.");
        }

        $fullRootPath = rtrim($config['base_path'], '/') . '/' . trim($relativePath, '/');

        return Storage::build([
            'driver' => 'local',
            'root'   => $fullRootPath,
            'throw'  => true,
        ]);
    }

    /**
     * Mengambil nama file dari database sub-bisnis berdasarkan ID transaksi (mencegah IDOR).
     */
    public function resolveFilenameFromDatabase(string $tenant, string $module, string $docType, int $transactionId, ?int $detailId = null): ?string
    {
        $config = $this->getTenantConfig($tenant);
        $db = DB::connection($config['db_connection']);
        $prefix = $config['table_prefix'];

        if ($module === 'reimbust' && $docType === 'kwitansi') {
            if (!$detailId) {
                throw new RuntimeException('Detail ID wajib disertakan untuk mengakses kwitansi.');
            }

            $record = $db->table("{$prefix}reimbust_detail")
                ->where('id', $detailId)
                ->where('reimbust_id', $transactionId)
                ->first(['kwitansi']);

            return $record?->kwitansi ? basename($record->kwitansi) : null;
        }

        if ($module === 'reimbust' && $docType === 'attachment') {
            $record = $db->table("{$prefix}reimbust")
                ->where('id', $transactionId)
                ->first(['attachment']);

            return $record?->attachment ? basename($record->attachment) : null;
        }

        throw new RuntimeException("Kombinasi modul '{$module}' dan tipe dokumen '{$docType}' tidak didukung.");
    }

    /**
     * Mengunggah bukti pembayaran dari Finance ke folder CI3 dan mengupdate database CI3 secara atomik.
     */
    public function uploadPaymentEvidence(
        string $tenant,
        int $transactionId,
        UploadedFile $file,
        string $paymentDate // format: Y-m-d
    ): string {
        $config = $this->getTenantConfig($tenant);
        $db = DB::connection($config['db_connection']);
        $tableName = $config['table_prefix'] . 'reimbust';

        // 1. Cek eksistensi transaksi & ambil nama file attachment lama jika ada
        $existing = $db->table($tableName)->where('id', $transactionId)->first(['id', 'attachment', 'payment_status']);
        if (!$existing) {
            throw new RuntimeException("Transaksi ID {$transactionId} tidak ditemukan pada sub-bisnis {$tenant}.");
        }

        // 2. Generate nama file sesuai standar CI3 Kps_reimbust::payment()
        // Format CI3: 'attachment_' . $id . '_' . date('YmdHis') . '.' . $ext
        $extension = strtolower($file->getClientOriginalExtension());
        $newFilename = 'attachment_' . $transactionId . '_' . now()->format('YmdHis') . '.' . $extension;

        $disk = $this->getScopedDisk($tenant, 'reimbust_attachment');

        // 3. Simpan file baru ke folder CI3
        $stored = $disk->putFileAs('', $file, $newFilename);
        if (!$stored || !$disk->exists($newFilename)) {
            throw new RuntimeException('Gagal menyimpan file bukti pembayaran ke direktori sub-bisnis.');
        }

        // 4. Update database sub-bisnis dalam blok transaksi dengan rollback file jika gagal
        try {
            $db->beginTransaction();

            $db->table($tableName)
                ->where('id', $transactionId)
                ->update([
                    'payment_status' => 'paid',
                    'tgl_pembayaran' => $paymentDate . ' ' . now()->format('H:i:s'),
                    'attachment'     => $newFilename,
                ]);

            $db->commit();
        } catch (\Throwable $e) {
            $db->rollBack();

            // Rollback file fisik yang baru diupload agar tidak menjadi orphan file
            if ($disk->exists($newFilename)) {
                $disk->delete($newFilename);
            }

            Log::error('Gagal update pembayaran ke DB sub-bisnis', [
                'tenant' => $tenant,
                'transaction_id' => $transactionId,
                'error' => $e->getMessage(),
            ]);

            throw new RuntimeException('Gagal memperbarui status pembayaran di database sub-bisnis: ' . $e->getMessage());
        }

        // 5. Hapus file lama (jika sebelumnya sudah pernah upload bukti bayar)
        if (!empty($existing->attachment) && $existing->attachment !== 'default.pdf' && $existing->attachment !== $newFilename) {
            $oldFile = basename($existing->attachment);
            if ($disk->exists($oldFile)) {
                $disk->delete($oldFile);
            }
        }

        // 6. Audit Log di Laravel Holding
        Log::info('Payment evidence uploaded from Holding to Sub-Business', [
            'user_id'        => auth()->id(),
            'tenant'         => $tenant,
            'transaction_id' => $transactionId,
            'filename'       => $newFilename,
            'sha256'         => hash_file('sha256', $disk->path($newFilename)),
        ]);

        return $newFilename;
    }

    // Tambahkan method ini di dalam class SubBusinessDocumentService
public function clearPaymentEvidence(string $tenant, int $transactionId): void
{
    $config = $this->getTenantConfig($tenant);
    $db = DB::connection($config['db_connection']);
    $tableName = $config['table_prefix'] . 'reimbust';

    $existing = $db->table($tableName)->where('id', $transactionId)->first(['id', 'attachment']);
    if (!$existing) {
        return;
    }

    $db->table($tableName)
        ->where('id', $transactionId)
        ->update([
            'payment_status' => 'unpaid',
            'tgl_pembayaran' => null,
            'attachment'     => null,
        ]);

    if (!empty($existing->attachment) && $existing->attachment !== 'default.pdf') {
        $disk = $this->getScopedDisk($tenant, 'reimbust_attachment');
        $oldFile = basename($existing->attachment);
        if ($disk->exists($oldFile)) {
            $disk->delete($oldFile);
        }
    }
}
}