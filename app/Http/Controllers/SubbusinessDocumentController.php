<?php

namespace App\Http\Controllers;

use App\Services\SubBusinessDocumentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SubBusinessDocumentController extends Controller
{
    public function __construct(
        protected SubBusinessDocumentService $documentService
    ) {}

    public function show(
        Request $request,
        string $tenant,
        string $module,
        string $type,
        int $id,
        ?int $detail = null
    ): StreamedResponse {
        // 1. Validasi URL Signature (mencegah URL tampering & link expired)
        if (!$request->hasValidSignature()) {
            abort(403, 'Tautan dokumen tidak valid atau sudah kedaluwarsa.');
        }

        // 2. Pastikan user terautentikasi di panel Holding
        if (!auth()->check()) {
            abort(401, 'Silakan login terlebih dahulu.');
        }

        // 3. Ambil nama file asli langsung dari DB sub-bisnis
        $filename = $this->documentService->resolveFilenameFromDatabase($tenant, $module, $type, $id, $detail);

        if (!$filename) {
            abort(404, 'Dokumen tidak tercatat pada database transaksi.');
        }

        // 4. Tentukan key folder disk
        $pathKey = "{$module}_{$type}"; // contoh: 'reimbust_kwitansi' atau 'reimbust_attachment'
        $disk = $this->documentService->getScopedDisk($tenant, $pathKey);

        if (!$disk->exists($filename)) {
            abort(404, 'File fisik dokumen tidak ditemukan di server sub-bisnis.');
        }

        // 5. Deteksi MIME type asli file
        $fullPath = $disk->path($filename);
        $mimeType = mime_content_type($fullPath) ?: 'application/octet-stream';
        $disposition = $request->boolean('download') ? 'attachment' : 'inline';

        // 6. Catat audit log akses dokumen
        Log::info('Document accessed via Holding Proxy', [
            'user_id'        => auth()->id(),
            'tenant'         => $tenant,
            'module'         => $module,
            'type'           => $type,
            'transaction_id' => $id,
            'detail_id'      => $detail,
            'mode'           => $disposition,
        ]);

        return response()->stream(function () use ($disk, $filename) {
            $stream = $disk->readStream($filename);
            fpassthru($stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
        }, 200, [
            'Content-Type'           => $mimeType,
            'Content-Disposition'    => "{$disposition}; filename=\"{$filename}\"",
            'X-Content-Type-Options' => 'nosniff',
            'Cache-Control'          => 'private, no-store, max-age=0',
        ]);
    }
}