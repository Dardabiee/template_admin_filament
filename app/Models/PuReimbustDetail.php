<?php

namespace App\Models;

use App\Models\PuDeklarasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PuReimbustDetail extends Model
{
    protected $connection = 'sw';
    protected $table = 'pu_reimbust_detail';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(PuReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasiRecord(): BelongsTo
    {
        return $this->belongsTo(PuDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }
}
