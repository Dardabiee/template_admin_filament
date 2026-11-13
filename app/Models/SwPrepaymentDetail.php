<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SwPrepaymentDetail extends Model
{
    //protected $connection = 'sw';


    protected $table = 'sw_prepayment_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function prepayment(): BelongsTo {
        return $this->belongsTo(SwPrepayment::class, 'prepayment_id', 'id');
    }
}
