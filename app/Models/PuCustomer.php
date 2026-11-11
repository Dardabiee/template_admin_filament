<?php

namespace App\Models;

use App\Models\PuTrCustomer;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PuCustomer extends Model
{
    // //protected $connection = 'sw';
    protected $table = 'pu_customer'; // Nama tabel database
    protected $primaryKey = 'id';
    public $timestamps = false; // Ubah ke true jika tabel menggunakan created_at & updated_at otomatis

    protected $guarded = [];

    /**
     * Relasi ke tabel transaksi customer (pu_tr_customer)
     */
    public function transaksi(): HasMany
    {
        return $this->hasMany(PuTrCustomer::class, 'customer_id', 'customer_id');
    }

    /**
     * Mengambil data customer berdasarkan ID
     */
    public static function getById($id)
    {
        return self::find($id);
    }

    /**
     * Generator kode otomatis untuk customer_id (C001, C002, dst)
     */
    public static function generateMaxKode(): string
    {
        $lastCustomer = self::orderBy('customer_id', 'DESC')->first();

        if ($lastCustomer && !empty($lastCustomer->customer_id)) {
            $lastNumber = (int) substr($lastCustomer->customer_id, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'C' . sprintf("%03d", $newNumber);
    }

    /**
     * Generator kode otomatis untuk group_id (G001, G002, dst)
     */
    public static function generateMaxKodeGroup(): string
    {
        $lastGroup = self::orderBy('group_id', 'DESC')->first();

        if ($lastGroup && !empty($lastGroup->group_id)) {
            $lastNumber = (int) substr($lastGroup->group_id, 1);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return 'G' . sprintf("%03d", $newNumber);
    }

    /**
     * Mengambil group_id terakhir
     */
    public static function getLastGroupId(): ?string
    {
        $lastCustomer = self::orderBy('group_id', 'DESC')->first();
        return $lastCustomer?->group_id;
    }
}