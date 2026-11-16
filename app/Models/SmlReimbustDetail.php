<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmlReimbustDetail extends Model
{
    protected $connection = 'samlog';

    protected $table = 'sml_reimbust_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(SmlReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasiRecord(): BelongsTo
    {
        return $this->belongsTo(SmlDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }
}
