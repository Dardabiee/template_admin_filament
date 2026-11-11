<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SwiInvoice extends Model
{
    //protected $connection = 'sw';
    protected $table = 'swi_invoice';
    protected $primaryKey = 'id';
    public $timestamps = false; // Menyesuaikan tabel legacy CI3

    protected $guarded = [];

    public function details(): HasMany
    {
        return $this->hasMany(SwiInvoiceDetail::class, 'invoice_id', 'id');
    }

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
