<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CtzReimbustDetail extends Model
{
    protected $connection = 'sw';

    protected $table = 'ctz_reimbust_detail';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(CtzReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasiRecord(): BelongsTo
    {
        return $this->belongsTo(CtzDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }
}
