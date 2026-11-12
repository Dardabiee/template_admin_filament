<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SwInvoice extends Model
{
    protected $connection = 'sw';

    protected $table = 'sw_invoice';
    protected $primaryKey = 'id';
    public $timestamps = false; // Menyesuaikan tabel legacy CI3

    protected $guarded = [];

    /**
     * Relasi ke Detail Invoice (sw_invoice_detail)
     */
    public function details(): HasMany
    {
        return $this->hasMany(SwInvoiceDetail::class, 'invoice_id', 'id');
    }

    /**
     * Mengambil data cetak berdasarkan ID beserta detail item 
     * (Menggantikan get_by_id_print di CI3)
     */
    public static function getByIdPrint($id)
    {
        $header = self::with('details')->find($id);

        if (!$header) {
            return null;
        }

        // Menyematkan properti 'items' agar kompatibel jika digunakan pada view cetak lama
        $header->items = $header->details;

        return $header;
    }
}