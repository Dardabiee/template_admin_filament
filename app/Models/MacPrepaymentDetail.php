<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MacPrepaymentDetail extends Model
{
    //protected $connection = 'mac';


    protected $table = 'mac_prepayment_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function prepayment(): BelongsTo {
        return $this->belongsTo(MacPrepayment::class, 'prepayment_id', 'id');
    }
}
