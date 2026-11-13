<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MacSk extends Model
{
    //protected $connection = 'mac';


    protected $table = 'mac_sk'; // Nama tabel dari database
    protected $primaryKey = 'id';
    public $timestamps = true; // Mengaktifkan created_at & updated_at jika digunakan

    protected $guarded = [];

    public static function getById($id)
    {
        return self::find($id);
    }
}
