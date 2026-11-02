<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PuTrCustomer extends Model
{   
    // protected $connection = 'sw';
    protected $table = 'pu_tr_customer'; // Nama tabel transaksi
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    /**
     * Relasi balik ke master customer
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(PuCustomer::class, 'customer_id', 'customer_id');
    }

    /**
     * Mengambil data transaksi berdasarkan ID
     */
    public static function getById($id)
    {
        return self::find($id);
    }
}