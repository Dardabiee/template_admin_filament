<?php

namespace App\Models;

use App\Models\KpsReimbustDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KpsReimbust extends Model
{
    //
    protected $connection = 'sw';
    protected $table = 'kps_reimbust';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function detail(): HasMany {
        return $this->hasMany(KpsReimbustDetail::class, 'reimbust_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(SwUser::class, 'id_user', 'id_user');
    }

    // Menghitung total dari seluruh item di detail reimburse
    public function getTotalPemakaianAttribute()
    {
        return $this->detail ? $this->detail->sum('jumlah') : 0;
    }

    // Menghitung sisa prepayment (Jumlah Prepayment - Total Pemakaian)
    public function getSisaPrepaymentAttribute()
    {
        return $this->sebesar - $this->getTotalPemakaianAttribute();
    }
 }
