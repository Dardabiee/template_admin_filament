<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BmnPrepaymentDetail extends Model
{
    protected $connection = 'sw';

    protected $table = 'bmn_prepayment_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function prepayment(): BelongsTo {
        return $this->belongsTo(BmnPrepayment::class, 'prepayment_id', 'id');
    }
}
