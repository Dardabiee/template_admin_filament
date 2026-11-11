<?php

namespace App\Models;

use App\Models\PuDetailInvoice;
use App\Models\PuOrder;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class PuInvoice extends Model
{   
    //protected $connection = 'sw';
    protected $table = 'pu_invoice';
    protected $tableDetail = 'pu_detail_invoice';
    protected $primaryKey = 'id';
    public $timestamps = false; // Menyesuaikan tabel legacy CI3

    protected $guarded = [];

    /**
     * Relasi ke tabel Order (pu_order)
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(PuOrder::class, 'order_id', 'id');
    }

    /**
     * Relasi ke Detail Invoice (pu_detail_invoice)
     */
    public function details(): HasMany
    {
        return $this->hasMany(PuDetailInvoice::class, 'invoice_id', 'id');
    }

    /**
     * Mengambil data invoice berdasarkan ID 
     * (Menggantikan get_by_id & getInvoiceData di CI3)[cite: 16]
     */
    public static function getInvoiceData($id)
    {
        return self::select([
            'id', 'tgl_invoice', 'kode_invoice', 'travel_id', 'total_tagihan', 
            'jamaah', 'detail_pesanan', 'diskon', 'tgl_tempo', 'ctc_nama', 
            'ctc_alamat', 'ctc_email', 'keterangan'
        ])->find($id)?->toArray();
    }

    /**
     * Mengambil detail invoice transaksi 
     * (Menggantikan get_detail di CI3)[cite: 16]
     */
    public static function getDetail($invoiceId)
    {
        return DB::table('pu_detail_invoice')
            ->where('invoice_id', $invoiceId)
            ->get()
            ->all();
    }

    /**
     * Mengambil data kwitansi berdasarkan ID[cite: 16]
     */
    public static function getKwitansi($id)
    {
        return DB::table('pu_kwitansi')->where('id', $id)->first();
    }

    /**
     * Generator kode invoice otomatis 
     * (Menggantikan max_kode di CI3)[cite: 16]
     */
    public static function generateMaxKode($date): string
    {
        $formattedDate = Carbon::parse($date)->format('ym');
        
        $lastRecord = self::whereRaw("SUBSTRING(kode_invoice, 6, 4) = ?", [$formattedDate])
            ->orderBy('id', 'desc')
            ->first();

        if (!$lastRecord) {
            return 'ORD-' . $formattedDate . '0001';
        }

        $lastNumber = (int) substr($lastRecord->kode_invoice, -4);
        return 'ORD-' . $formattedDate . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Generator kode order otomatis[cite: 16]
     */
    public static function generateMaxKodeOrder($date): ?string
    {
        $year = Carbon::parse($date)->format('y');

        $lastOrder = DB::table('pu_order')
            ->whereRaw("SUBSTRING(kode_order, 4, 2) = ?", [$year])
            ->orderBy('id', 'DESC')
            ->first();

        return $lastOrder?->kode_order;
    }

    /**
     * Opsi Rekening Bank (Menggantikan options di CI3)[cite: 16]
     */
    public static function getBankOptions()
    {
        return DB::table('pu_travel')
            ->distinct()
            ->select(['id', 'travel', 'nama_bank', 'no_rek'])
            ->get();
    }
}