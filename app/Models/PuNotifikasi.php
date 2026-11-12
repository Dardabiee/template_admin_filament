<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PuNotifikasi extends Model
{   
    protected $connection = 'sw';

    protected $table = 'pu_notifikasi'; // Nama tabel database
    protected $primaryKey = 'id';
    public $timestamps = false; // Sesuaikan jika tabel tidak memiliki created_at/updated_at bawaan Laravel

    protected $guarded = [];

    /**
     * Relasi ke tabel user (tbl_data_user)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(SwUser::class, 'id_user', 'id_user');
    }

    /**
     * Mengambil data berdasarkan ID (Menggantikan get_by_id di CI3)
     */
    public static function getById($id)
    {
        return self::with('user')->find($id);
    }

    /**
     * Generator kode notifikasi otomatis (Menggantikan max_kode di CI3)
     */
    public static function generateMaxKode($date): string
    {
        $formattedDate = Carbon::parse($date)->format('ym');

        $lastRecord = self::whereRaw("SUBSTRING(kode_notifikasi, 2, 4) = ?", [$formattedDate])
            ->orderBy('id', 'desc')
            ->first();

        if (!$lastRecord) {
            return 'N' . $formattedDate . '0001';
        }

        $lastNumber = (int) substr($lastRecord->kode_notifikasi, -4);
        return 'N' . $formattedDate . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Scope untuk Filter Status Persetujuan (Menyesuaikan _get_datatables_query di CI3)
     */
    public function scopeFilterStatus($query, ?string $status, $userId)
    {
        if (empty($status)) {
            return $query;
        }

        $userName = DB::table('tbl_data_user')->where('id_user', $userId)->value('name');

        return $query->where(function ($q) use ($status, $userId, $userName) {
            if ($status === 'on-process') {
                $q->where('app_hc_status', 'waiting')
                  ->where('app2_status', 'waiting')
                  ->orWhere(function ($sub) use ($userId) {
                      $sub->where('pu_notifikasi.id_user', $userId)
                          ->where('app_hc_status', 'approved')
                          ->where('app2_status', 'waiting');
                  })
                  ->orWhere('app2_name', $userName)
                  ->orWhere('app_hc_name', $userName);
            } elseif ($status === 'approved') {
                $q->where('app_hc_status', 'approved')
                  ->where('app2_status', 'approved');
            } elseif ($status === 'revised') {
                $q->where('app2_name', $userName)
                  ->where('app2_status', 'revised')
                  ->orWhere('app_hc_name', $userName)
                  ->where('app_hc_status', 'revised')
                  ->orWhere(function ($sub) use ($userId) {
                      $sub->where('pu_notifikasi.id_user', $userId)
                          ->where(function ($s) {
                              $s->where('app_hc_status', 'revised')
                                ->orWhere('app2_status', 'revised');
                          });
                  });
            } elseif ($status === 'rejected') {
                $q->where('status', 'rejected');
            }
        });
    }

    /**
     * Scope untuk Filter Tab (Personal vs Employee)
     */
    public function scopeFilterTab($query, ?string $tab, $userId)
    {
        if (empty($tab)) {
            return $query;
        }

        $userName = DB::table('tbl_data_user')->where('id_user', $userId)->value('name');

        return $query->where(function ($q) use ($tab, $userId, $userName) {
            if ($tab === 'personal') {
                $q->where('pu_notifikasi.id_user', $userId);
            } elseif ($tab === 'employee') {
                $q->where(function ($sub) use ($userId, $userName) {
                    $sub->where('pu_notifikasi.app_hc_name', $userName)
                        ->where('pu_notifikasi.id_user', '!=', $userId);
                })->orWhere(function ($sub) use ($userId, $userName) {
                    $sub->where('pu_notifikasi.app2_name', $userName)
                        ->where('pu_notifikasi.app_hc_status', 'approved')
                        ->where('pu_notifikasi.id_user', '!=', $userId);
                });
            }
        });
    }
}