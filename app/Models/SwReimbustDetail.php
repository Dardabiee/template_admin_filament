<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SwReimbustDetail extends Model
{
    protected $connection = 'sw';
    protected $table = 'sw_reimbust_detail';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(SwReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasiRecord(): BelongsTo
    {
        return $this->belongsTo(SwDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }
}