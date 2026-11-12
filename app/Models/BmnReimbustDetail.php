<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BmnReimbustDetail extends Model
{
    protected $connection = 'sw';

    protected $table = 'bmn_reimbust_detail';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(BmnReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasiRecord(): BelongsTo
    {
        return $this->belongsTo(BmnDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }
}
