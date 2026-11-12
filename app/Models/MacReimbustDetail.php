<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MacReimbustDetail extends Model
{
    protected $connection = 'mac';

    protected $table = 'mac_reimbust_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(MacReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasRecord(): BelongsTo
    {
        return $this->belonsTo(MacDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }
}
