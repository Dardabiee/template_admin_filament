<?php

namespace App\Models;

use App\Models\QbgInvoiceDetail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class QbgInvoice extends Model
{
    //protected $connection = 'sw';


    protected $table = 'qbg_invoice';
    protected $primaryKey = 'id';
    public $timestamps = false; // Menyesuaikan tabel legacy CI3

    protected $guarded = [];

    /**
     * Relasi ke Detail Invoice (qbg_detail_invoice)
     */
    public function details(): HasMany
    {
        return $this->hasMany(QbgInvoiceDetail::class, 'invoice_id', 'id');
    }

    /**
     * Relasi ke Rekening Invoice (qbg_rek_invoice)
     */
    public function accounts(): HasMany
    {
        return $this->hasMany(QbgRekInvoice::class, 'invoice_id', 'id');
    }

    /**
     * Mengambil data berdasarkan ID (Menggantikan get_by_id & getInvoiceData)[cite: 23]
     */
    public static function getInvoiceData($id)
    {
        return self::select([
            'tgl_invoice', 'kode_invoice', 'tgl_tempo', 'nama_customer', 
            'nomor_customer', 'email_customer', 'alamat_customer', 'jenis_harga', 
            'potongan_harga', 'ongkir', 'total', 'grand_total', 'keterangan'
        ])->find($id)?->toArray();
    }

    /**
     * Total Statistik Paid & Unpaid (Menggantikan get_totals)[cite: 23]
     */
    public static function getTotals(): array
    {
        $result = self::select(
            DB::raw("COALESCE(SUM(CASE WHEN payment_status = 'paid' THEN grand_total ELSE 0 END), 0) AS total_paid"),
            DB::raw("COALESCE(SUM(CASE WHEN payment_status = 'unpaid' OR payment_status IS NULL OR payment_status = '' THEN grand_total ELSE 0 END), 0) AS total_unpaid")
        )->first();

        return $result ? $result->toArray() : ['total_paid' => 0, 'total_unpaid' => 0];
    }

    /**
     * Generator kode invoice otomatis (Menggantikan max_kode)[cite: 23]
     */
    public static function generateMaxKode($date): string
    {
        $formattedDate = Carbon::parse($date)->format('ym');

        $lastRecord = self::whereRaw("SUBSTRING(kode_invoice, 2, 4) = ?", [$formattedDate])
            ->orderBy('id', 'desc')
            ->first();

        if (!$lastRecord) {
            return 'I' . $formattedDate . '0001';
        }

        $lastNumber = (int) substr($lastRecord->kode_invoice, -4);
        return 'I' . $formattedDate . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Update Stok Produk Berdasarkan Transaksi (Menggantikan updateStok)[cite: 23]
     */
    public static function updateStokGlobal(): bool
    {
        $stokProduk = DB::table('qbg_transaksi')
            ->select(
                'kode_produk',
                DB::raw('SUM(CASE WHEN jenis_transaksi = "keluar" THEN jumlah ELSE 0 END) AS stok_keluar'),
                DB::raw('SUM(CASE WHEN jenis_transaksi = "masuk" THEN jumlah ELSE 0 END) AS stok_masuk'),
                DB::raw('SUM(CASE WHEN jenis_transaksi = "masuk" THEN jumlah ELSE 0 END) - SUM(CASE WHEN jenis_transaksi = "keluar" THEN jumlah ELSE 0 END) AS stok_akhir')
            )
            ->groupBy('kode_produk')
            ->get();

        if ($stokProduk->isEmpty()) {
            return true;
        }

        DB::beginTransaction();
        try {
            foreach ($stokProduk as $stok) {
                DB::table('qbg_produk')
                    ->where('kode_produk', $stok->kode_produk)
                    ->update(['stok_akhir' => $stok->stok_akhir]);
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollBack();
            return false;
        }
    }
}