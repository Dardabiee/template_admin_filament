<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KpsPrepaymentDetail extends Model
{
    protected $connection = 'sw';
    protected $table = 'kps_prepayment_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function prepayment(): BelongsTo {
        return $this->belongsTo(KpsPrepayment::class, 'prepayment_id', 'id');
    }
}
