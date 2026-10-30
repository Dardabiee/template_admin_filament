<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuHotel extends Model
{   
    //protected $connection = 'sw';
    protected $table = 'pu_hotel'; 
    protected $primaryKey = 'id';
    public $timestamps = false; 

    protected $guarded = [];

    /**
     * Mengambil data berdasarkan ID 
     * (Menggantikan fungsi get_by_id di CI3)
     */
    public static function getById($id)
    {
        return self::find($id);
    }
}