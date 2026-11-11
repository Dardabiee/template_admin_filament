<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SwInvoiceDetail extends Model
{   
    //protected $connection = 'sw';
    protected $table = 'sw_invoice_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(SwInvoice::class, 'invoice_id', 'id');
    }
}