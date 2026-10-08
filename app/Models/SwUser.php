<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SwUser extends Model
{
    protected $connection = 'sw';
    protected $table = 'tbl_user'; // Atau 'tbl_data_user', sesuaikan dengan tabel user di database sw Anda
    protected $primaryKey = 'id_user';
    public $timestamps = false;
}
