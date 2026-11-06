<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QbgPrepayment extends Model
{
    protected $connection = 'sw';
    protected $table = 'qbg_prepayment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function details() {
        return $this->hasMany(QbgPrepaymentDetail::class, 'prepayment_id', 'id');
    }

    public function user(): BelongsTo{
        return $this->belongsTo(SwUser::class, 'id_pengaju', 'id_user');
    }

    public function reimbusts() {
        return $this->hasMany(QbgReimbust::class, 'prepayment_id', 'id');
    }
}
