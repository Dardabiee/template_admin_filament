<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HmReimbustDetail extends Model
{
    //protected $connection = 'hm';
    protected $table = 'hm_reimbust_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function reimbust(): BelongsTo
    {
        return $this->belongsTo(HmReimbust::class, 'reimbust_id', 'id');
    }

    public function deklarasRecord(): BelongsTo
    {
        return $this->belonsTo(HmDeklarasi::class, 'deklarasi', 'kode_deklarasi');
    }

    
}
