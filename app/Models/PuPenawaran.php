<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Carbon\Carbon;

class PuPenawaran extends Model
{
    protected $table = 'pu_penawaran'; // Nama tabel database[cite: 9]
    protected $primaryKey = 'id';
    public $timestamps = false; // Ubah ke true jika tabel memiliki kolom created_at & updated_at otomatis

    protected $guarded = [];

    /**
     * Format tanggal ke bahasa Indonesia (Menggantikan format_tanggal_indo di CI3)[cite: 9]
     */
    public static function getTanggalIndo($date): ?string
    {
        if (empty($date)) {
            return null;
        }

        $carbonDate = Carbon::parse($date);
        
        // Terjemahan bulan manual atau menggunakan Carbon locale ID
        $carbonDate->locale('id');

        return $carbonDate->translatedFormat('d F Y');
    }

    /**
     * Mengambil data penawaran berdasarkan ID[cite: 9]
     */
    public static function getPenawaranById($id)
    {
        return self::find($id);
    }

    /**
     * Mengambil rundown berdasarkan no_pelayanan[cite: 9]
     */
    public static function getRundown($noPelayanan)
    {
        return DB::table('pu_rundown')->where('no_pelayanan', $noPelayanan)->get()->toArray();
    }

    /**
     * Mengambil data penawaran berdasarkan arsip dengan join ke pu_arsip[cite: 9]
     */
    public static function getPenawaranByArsip($kode)
    {
        return self::query()
            ->select([
                'no_pelayanan', 'pu_penawaran.no_arsip', 'tgl_berlaku', 'produk', 
                'pelanggan', 'deskripsi', 'tgl_keberangkatan', 'durasi', 
                'keberangkatan', 'kepulangan', 'berangkat_dari', 'pkt_quad', 
                'pkt_triple', 'pkt_double', 'notes', 'pu_penawaran.created_at'
            ])
            ->from('pu_penawaran as a')
            ->leftJoin('pu_arsip as b', 'a.no_pelayanan', '=', 'b.no_dokumen')
            ->where('a.no_arsip', $kode)
            ->first()?->toArray();
    }

    /**
     * Generator kode pelayanan otomatis[cite: 9]
     */
    public static function generateMaxKode($date)
    {
        $year = Carbon::parse($date)->format('Y');
        
        $lastRecord = self::whereRaw("SUBSTRING(no_pelayanan, -4, 4) = ?", [$year])
            ->orderBy('id', 'desc')
            ->first();

        return $lastRecord; // Bisa dilanjutkan logika increment nomor urutnya sesuai kebutuhan
    }

    /**
     * Relasi ke layanan termasuk (is_active = 'Y')[cite: 9]
     */
    public function getLayananTermasukAttribute()
    {
        return DB::table('pu_layanan as a')
            ->select(['a.nama_layanan', 'b.id_penawaran', 'b.id_layanan', 'b.is_active'])
            ->leftJoin('pu_penawaran_detail_lyn as b', 'a.id', '=', 'b.id_layanan')
            ->leftJoin('pu_penawaran as c', 'b.id_penawaran', '=', 'c.id')
            ->where('b.is_active', 'Y')
            ->where('c.no_arsip', $this->no_arsip)
            ->get()
            ->toArray();
    }

    /**
     * Relasi ke layanan tidak termasuk (is_active dimulai dari 'N')[cite: 9]
     */
    public function getLayananTidakTermasukAttribute()
    {
        return DB::table('pu_layanan as a')
            ->select(['a.nama_layanan', 'b.id_penawaran', 'b.id_layanan', 'b.is_active'])
            ->leftJoin('pu_penawaran_detail_lyn as b', 'a.id', '=', 'b.id_layanan')
            ->leftJoin('pu_penawaran as c', 'b.id_penawaran', '=', 'c.id')
            ->where(function($query) {
                $query->where('b.is_active', 'N')
                      ->orWhere(function($q) {
                          $q->where('b.is_active', 'like', 'N%')
                            ->whereRaw('LENGTH(b.is_active) > 1');
                      });
            })
            ->where('c.no_arsip', $this->no_arsip)
            ->get()
            ->toArray();
    }

    /**
     * Mengambil daftar hotel berdasarkan penawaran[cite: 9]
     */
    public function getHotelsAttribute()
    {
        return DB::table('pu_hotel as a')
            ->select(['a.id', 'a.nama_hotel', 'a.rating', 'a.kota', 'a.negara'])
            ->leftJoin('pu_penawaran_detail_htl as b', 'a.id', '=', 'b.id_hotel')
            ->leftJoin('pu_penawaran as c', 'c.id', '=', 'b.id_penawaran')
            ->where('c.id', $this->id)
            ->get()
            ->all();
    }
}