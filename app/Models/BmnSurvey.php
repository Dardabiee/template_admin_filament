<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BmnSurvey extends Model
{
    //protected $connection = 'sw';
    protected $table = 'bmn_survey';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public static function getById($id)
    {
        return self::find($id);
    }
}
