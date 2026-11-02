<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PuLandArrangement extends Model
{
    //protected &connection = 'sw';
    protected $table = 'pu_land_arrangement'; // Nama tabel database[cite: 10]
    protected $primaryKey = 'id';
    public $timestamps = false; // Ubah ke true jika tabel memiliki created_at & updated_at otomatis

    protected $guarded = [];

    /**
     * Format tanggal ke bahasa Indonesia (Menggantikan format_tanggal_indo di CI3)[cite: 10]
     */
    public static function getTanggalIndo($date): ?string
    {
        if (empty($date)) {
            return null;
        }

        $carbonDate = Carbon::parse($date);
        $carbonDate->locale('id');

        return $carbonDate->translatedFormat('d F Y');
    }

    /**
     * Mengambil data land arrangement berdasarkan ID[cite: 10]
     */
    public static function getPenawaranById($id)
    {
        return self::find($id);
    }

    /**
     * Mengambil rundown berdasarkan no_pelayanan[cite: 10]
     */
    public static function getRundown($noPelayanan)
    {
        return DB::table('pu_rundown')->where('no_pelayanan', $noPelayanan)->get()->all();
    }

    /**
     * Mengambil daftar hotel berdasarkan ID Land Arrangement (Join dengan pu_hotel)[cite: 10]
     */
    public static function getHotels($idLa)
    {
        return DB::table('pu_land_arrangement_htl as a')
            ->select(['b.id', 'b.nama_hotel', 'b.rating', 'b.kota', 'b.negara'])
            ->join('pu_hotel as b', 'a.id_hotel', '=', 'b.id')
            ->where('a.id_la', $idLa)
            ->get()
            ->all();
    }

    /**
     * Mengambil relasi detail hotel land arrangement[cite: 10]
     */
    public static function getLaHotel($idLa)
    {
        return DB::table('pu_land_arrangement_htl')
            ->select(['id_la', 'id_hotel', 'is_active'])
            ->where('id_la', $idLa)
            ->get()
            ->toArray();
    }
}