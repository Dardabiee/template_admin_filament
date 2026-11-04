<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QbgSK extends Model
{
    //protected $connection = 'sw';
     protected $table = 'qbg_sk'; 
    protected $primaryKey = 'id';
    public $timestamps = true; 

    protected $guarded = [];

    public static function getById($id)
    {
        return self::find($id);
    }
}
