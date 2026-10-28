<?php

namespace App\Models;

use App\Models\KpsReimbustDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KpsReimbust extends Model
{
    //
    //protected $connection = 'sw';
    protected $table = 'kps_reimbust';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $guarded = [];

    public function detail(): HasMany {
        return $this->hasMany(KpsReimbustDetail::class, 'reimbust_id', 'id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(SwUser::class, 'id_user', 'id_user');
    }

    // Menghitung total dari seluruh item di detail reimburse
    public function getTotalPemakaianAttribute()
    {
        return $this->detail ? $this->detail->sum('jumlah') : 0;
    }

    // Menghitung sisa prepayment (Jumlah Prepayment - Total Pemakaian)
    public function getSisaPrepaymentAttribute()
    {
        return $this->sebesar - $this->getTotalPemakaianAttribute();
    }

    public static function getTotalPengeluaran(?string $tglAwal = null, ?string $tglAkhir = null): array
    {
        // 1. Total Prepayment (yang belum ada reimbust-nya)
        $queryPrepayment = self::query()
            ->from('kps_prepayment as a')
            ->leftJoin('kps_reimbust as b', 'a.kode_prepayment', '=', 'b.kode_prepayment')
            ->where('a.payment_status', 'paid')
            ->where('a.status', 'approved')
            ->whereNull('b.kode_prepayment');

        if (!empty($tglAwal) && !empty($tglAkhir)) {
            $queryPrepayment->whereBetween('a.tgl_prepayment', [$tglAwal, $tglAkhir]);
        }
        $totalPrepayment = $queryPrepayment->sum('a.total_nominal') ?? 0;

        // 2. Total Pelaporan (Reimbust dengan Prepayment)[cite: 3]
        $queryPelaporan = self::query()
            ->from('kps_reimbust as a')
            ->leftJoin('kps_reimbust_detail as b', 'a.id', '=', 'b.reimbust_id')
            ->rightJoin('kps_prepayment as c', 'c.kode_prepayment', '=', 'a.kode_prepayment')
            ->where('a.payment_status', 'paid')
            ->where('a.status', 'approved')
            ->where('c.payment_status', 'paid')
            ->where('c.status', 'approved')
            ->where('a.kode_prepayment', '!=', '');

        if (!empty($tglAwal) && !empty($tglAkhir)) {
            $queryPelaporan->whereBetween('a.tgl_pengajuan', [$tglAwal, $tglAkhir]);
        }
        $totalPelaporan = $queryPelaporan->sum('b.jumlah') ?? 0;

        // 3. Total Reimbust Murni (Tanpa Prepayment)[cite: 3]
        $queryReimbust = self::query()
            ->from('kps_reimbust as a')
            ->leftJoin('kps_reimbust_detail as b', 'a.id', '=', 'b.reimbust_id')
            ->where('a.payment_status', 'paid')
            ->where('a.status', 'approved')
            ->where('a.kode_prepayment', '');

        if (!empty($tglAwal) && !empty($tglAkhir)) {
            $queryReimbust->whereBetween('a.tgl_pengajuan', [$tglAwal, $tglAkhir]);
        }
        $totalReimbust = $queryReimbust->sum('b.jumlah') ?? 0;

        $totalKeseluruhan = $totalPrepayment + $totalPelaporan + $totalReimbust;

        return [
            'total_prepayment'   => $totalPrepayment,
            'total_pelaporan'    => $totalPelaporan,
            'total_reimbust'     => $totalReimbust,
            'total_pengeluaran'  => $totalKeseluruhan,
        ];
    }
    
    public function prepayment(): BelongsTo {
        return $this->belongsTo(KpsPrepayment::class, 'kode_prepayment', 'kode_prepayment');
    }
 }
