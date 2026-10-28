<?php

namespace App\Models;

use App\Models\PuReimbustDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PuReimbust extends Model
{
    //protected $connection = 'sw';
    protected $table = 'pu_reimbust';
    protected $primaryKey = 'id';

    public $guarded = [];

    public function user(): BelongsTo {
        return $this->belongsTo(SwUser::class, 'id_user', 'id_user');
    }

    public function detail(): HasMany {
        return $this->hasMany(PuReimbustDetail::class, 'reimbust_id', 'id');
    }

    public function getTotalPemakaianAttribute(){
        return $this->detail ? $this->detail->sum('jumlah') : 0;
    }

    public function getSisaPrepaymentAttribute() {
        return $this->sebesar - $this->getTotalPemakaianAttribute();
    }


}
