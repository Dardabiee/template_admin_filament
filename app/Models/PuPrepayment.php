<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PuPrepayment extends Model
{
    //protected $connection = 'sw';
    protected $table = 'pu_prepayment';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function details(): HasMany
    {
        return $this->hasMany(PuPrepaymentDetail::class, 'prepayment_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(SwUser::class, 'id_user', 'id_user');
    }

    public static function generateKodePrepayment($date)
    {
        $formattedDate = Carbon::parse($date)->format('ym'); // Format YYMM
        
        // Cari kode terakhir di bulan/tahun tersebut
        $lastRecord = self::whereRaw("SUBSTRING(kode_prepayment, 2, 4) = ?", [$formattedDate])
            ->orderBy('id', 'desc')
            ->first();

        if (!$lastRecord) {
            return 'P' . $formattedDate . '001'; // Sesuaikan awalan jika ada (misal P)
        }

        // Ambil nomor urut terakhir, increment
        // Asumsi format kode: P[YYMM][NomorUrut]
        $lastNumber = (int) substr($lastRecord->kode_prepayment, -3);
        $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);

        return 'P' . $formattedDate . $nextNumber;
    }
}
