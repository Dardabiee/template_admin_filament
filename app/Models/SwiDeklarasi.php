<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SwiDeklarasi extends Model
{
    //protected $connection = 'sw';
    protected $table = 'swi_deklarasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(SwUser::class, 'id_pengaju', 'id_user');
    }
}
