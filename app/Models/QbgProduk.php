<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QbgProduk extends Model
{
    //protected $connection = 'sw';


    protected $table = 'qbg_produk';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $guarded = [];

    public static function getProdukById($id) {
        return self::find($id);
    }

    public function transaksi(): HasMany
    {
        return $this->hasMany(QbgTransaksi::class, 'kode_produk', 'kode_produk');
    }
}
