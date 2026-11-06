<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PuOrder extends Model
{   
    protected $connection = 'sw';
    protected $table = 'pu_order';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function invoices(): HasMany
    {
        return $this->hasMany(PuInvoice::class, 'order_id', 'id');
    }
}