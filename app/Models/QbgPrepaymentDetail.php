<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QbgPrepaymentDetail extends Model
{
    //protected $connection = 'sw';


    protected $table = 'qbg_prepayment_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function prepayment(): BelongsTo {
        return $this->belongsTo(QbgPrepayment::class, 'prepayment_id', 'id');
    }
}
