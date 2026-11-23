<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class HmUser extends Model
{   
    use HasFactory, Notifiable, HasRoles;
    protected $connection = 'hm';

    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
}
