<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SmlSk extends Model
{
    protected $connection = 'samlog';
    
    protected $table = 'sml_sk'; 
    protected $primaryKey = 'id';
    public $timestamps = true; 

    protected $guarded = [];

    public static function getById($id)
    {
        return self::find($id);
    }
}
