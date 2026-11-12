<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class SwUser extends Model
{
    use HasFactory, Notifiable, HasRoles;
    
    protected $connection = 'sw';

    protected $table = 'tbl_user'; // Atau 'tbl_data_user', sesuaikan dengan tabel user di database sw Anda
    protected $primaryKey = 'id_user';
    public $timestamps = false;
}
