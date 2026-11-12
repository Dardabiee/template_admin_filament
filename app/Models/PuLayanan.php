<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuLayanan extends Model
{   
    protected $connection = 'sw';

    protected $table = 'pu_layanan'; // Nama tabel dari database[cite: 11]
    protected $primaryKey = 'id';
    public $timestamps = false; // Ubah ke true jika tabel menggunakan created_at & updated_at otomatis

    protected $guarded = [];

    /**
     * Mengambil data berdasarkan ID 
     * (Menggantikan fungsi get_by_id di CI3)[cite: 11]
     */
    public static function getById($id)
    {
        return self::find($id);
    }
}