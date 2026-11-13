<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QbgInvoiceDetail extends Model
{
    //protected $connection = 'sw';


    protected $table = 'qbg_detail_invoice';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function invoice(): BelongsTo
    {
        return $this->belongsTo(QbgInvoice::class, 'invoice_id', 'id');
    }
}