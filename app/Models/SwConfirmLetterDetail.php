<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SwConfirmLetterDetail extends Model
{
    protected $connection = 'sw';

    protected $table = 'sw_confirm_letter_detail';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = [];

    public function confirmLetter(): BelongsTo
    {
        return $this->belongsTo(SwConfirmLetter::class, 'letter_id', 'id');
    }
}