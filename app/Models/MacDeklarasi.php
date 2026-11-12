<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MacDeklarasi extends Model
{
    protected $connection = 'mac';

    protected $table = 'mac_deklarasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(MacUser::class, 'id_pengaju', 'id_user');
    }
}
