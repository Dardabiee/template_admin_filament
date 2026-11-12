<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QbgRekInvoice extends Model
{   
    protected $connection = 'sw';

    protected $table = 'qbg_rek_invoice';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];
}