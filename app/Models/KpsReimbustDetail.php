<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KpsReimbustDetail extends Model
{
    //
    protected $connection = 'sw';
    protected $table = 'kps_reimbust_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(KpsReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasiRecord(): BelongsTo
    {
        return $this->belongsTo(KpsDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }
}
