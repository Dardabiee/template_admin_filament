<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SwiReimbustDetail extends Model
{
    protected $connection = 'sw';

    protected $table = 'swi_reimbust_detail';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(SwiReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasiRecord(): BelongsTo
    {
        return $this->belongsTo(SwiDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }
}
