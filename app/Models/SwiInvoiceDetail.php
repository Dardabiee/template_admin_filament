<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SwiInvoiceDetail extends Model
{
    //protected $connection = 'sw';


    protected $table = 'swi_invoice_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(SwiInvoice::class, 'invoice_id', 'id');
    }
}
