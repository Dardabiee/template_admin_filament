<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KpsKontrakPkwt extends Model
{
    protected $connection = 'sw';
    protected $table = 'kps_kontrak_pkwt';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'npk',
        'jk_awal',
        'jk_akhir',
    ];

    /**
     * Relasi balik ke Karyawan
     */
    // fn(): BelongsTo => $this->belongsTo(KpsKaryawan::class, 'npk', 'npk');
    
    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(KpsKaryawan::class, 'npk', 'npk');
    }
}