<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpsSk extends Model
{
    //protected $connection = 'sw';
    protected $table = 'kps_sk';
    protected $primaryKey = 'id';

    public $timestamps = false;


    public static function getById($id)
    {
        return self::find($id);
    }
}
