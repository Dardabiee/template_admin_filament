<?php

namespace App\Models;

use App\Models\KpsPrepaymentDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KpsPrepayment extends Model
{
    protected $connection = 'sw';
    protected $table = 'kps_prepayment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function details(): HasMany
    {
        return $this->hasMany(KpsPrepaymentDetail::class, 'prepayment_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(SwUser::class, 'id_user', 'id_user');
    }
}