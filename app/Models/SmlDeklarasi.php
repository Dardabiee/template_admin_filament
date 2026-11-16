<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmlDeklarasi extends Model
{
    protected $connection = 'samlog';

    protected $table = 'sml_deklarasi';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(SmlUser::class, 'id_pengaju', 'id_user');
    }
}
