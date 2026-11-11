<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuTandaTerima extends Model
{
    //protected $connection = 'sw';
    protected $table = 'pu_tanda_terima';
    protected $primaryKey = 'id';

    public $timestamps = false;

    public static function getById($id)
    {
        return self::find($id);
    }

    public static function jmlData()
    {
        return self::count();
    }
}
