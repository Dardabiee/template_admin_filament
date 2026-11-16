<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmlPrepaymentDetail extends Model
{
    protected $connection = 'samlog';

    protected $table = 'sml_prepayment_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function prepayment(): BelongsTo {
        return $this->belongsTo(SmlPrepayment::class, 'prepayment_id', 'id');
    }
}
