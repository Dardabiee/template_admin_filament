<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HmPrepaymentDetail extends Model
{
    protected $connection = 'hm';


    protected $table = 'hm_prepayment_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function prepayment(): BelongsTo {
        return $this->belongsTo(HmPrepayment::class, 'prepayment_id', 'id');
    }
}
