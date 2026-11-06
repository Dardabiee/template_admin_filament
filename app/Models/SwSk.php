<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SwSk extends Model
{
    protected $connection = 'sw';
    protected $table = 'sw_sk'; 
    protected $primaryKey = 'id';
    public $timestamps = true; 

    protected $guarded = [];

    public static function getById($id)
    {
        return self::find($id);
    }
}
