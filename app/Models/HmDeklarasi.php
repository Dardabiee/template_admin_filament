<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HmDeklarasi extends Model
{
    protected $connection = 'hm';

    protected $table = 'hm_deklarasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function user(): BelongsTo{
        return $this->belongsTo(HmUser::class, 'id_pengaju', 'id_user');
    }
}
