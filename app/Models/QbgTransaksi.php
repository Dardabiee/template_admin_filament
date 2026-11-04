<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QbgTransaksi extends Model
{   
    //protected $connection = 'sw';
    protected $table = 'qbg_transaksi';
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $guarded = [];

    /**
     * Relasi ke Tabel Produk (qbg_produk)
     */
    public function produk(): BelongsTo
    {
        return $this->belongsTo(QbgProduk::class, 'kode_produk', 'kode_produk');
    }

    /**
     * Scope untuk Filter Transaksi (Menyesuaikan _get_datatables_query di CI3)
     */
    public function scopeFilterTransaksi($query, $kodeProduk = 'all', $jenisTransaksi = 'all', $keterangan = 'all', $tglAwal = 0, $tglAkhir = 0)
    {
        if ($kodeProduk !== 'all' && !empty($kodeProduk)) {
            $query->where('qbg_transaksi.kode_produk', $kodeProduk);
        }

        if ($jenisTransaksi !== 'all' && !empty($jenisTransaksi)) {
            $query->where('qbg_transaksi.jenis_transaksi', $jenisTransaksi);
        }

        if ($keterangan !== 'all' && !empty($keterangan)) {
            $query->where('qbg_transaksi.keterangan', 'like', '%' . $keterangan . '%');
        }

        if (!empty($tglAwal) && $tglAwal != 0) {
            $query->whereDate('qbg_transaksi.created_at', '>=', $tglAwal);
        }

        if (!empty($tglAkhir) && $tglAkhir != 0) {
            $query->whereDate('qbg_transaksi.created_at', '<=', $tglAkhir);
        }

        return $query;
    }
}