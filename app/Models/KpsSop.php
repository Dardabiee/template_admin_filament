<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KpsSop extends Model
{   
    //protected $connection = 'sw';
    protected $table = 'kps_sop'; // Nama tabel database[cite: 7]
    protected $primaryKey = 'id';
    public $timestamps = false; // Set true jika tabel menggunakan created_at & updated_at otomatis

    protected $guarded = [];

    /**
     * Relasi Parent (Self-Relationship)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(KpsSop::class, 'parent_id', 'id');
    }

    /**
     * Relasi Children (Self-Relationship)
     */
    public function children(): HasMany
    {
        return $this->hasMany(KpsSop::class, 'parent_id', 'id');
    }

    /**
     * Mengambil data berdasarkan ID (dengan tambahan nomor parent jika ada)
     */
    public static function getById($id)
    {
        $result = self::find($id);

        if ($result && $result->parent_id) {
            $parent = self::find($result->parent_id);
            if ($parent) {
                $result->parent_no = $parent->no;
            }
        }

        return $result;
    }

    /**
     * Ambil data berdasarkan nomor hierarki (kolom no)
     */
    public static function getByNo($no)
    {
        return self::where('no', $no)->first();
    }

    /**
     * Generate kode otomatis berdasarkan jenis (SOP, Juklak, Juknis)
     */
    public static function generateKode($jenis): string
    {
        $prefixMap = [
            'SOP'    => 'SOP',
            'Juklak' => 'JKL',
            'Juknis' => 'JKN',
        ];

        $prefix = $prefixMap[$jenis] ?? 'SOP';

        $lastRecord = self::where('jenis', $jenis)
            ->orderBy('id', 'DESC')
            ->first();

        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->kode, -4));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Generate nomor hierarki berdasarkan jenis dan parent
     */
    public static function generateNoHierarki($jenis, $parentId = null)
    {
        if ($jenis === 'SOP') {
            $lastRecord = self::where('jenis', 'SOP')
                ->whereNull('parent_id')
                ->orderBy('id', 'DESC')
                ->first();

            $nextNumber = $lastRecord ? intval($lastRecord->no) + 1 : 1;
            return (string) $nextNumber;
        } else {
            if (!$parentId) {
                return null;
            }

            $parent = self::find($parentId);
            if (!$parent) {
                return null;
            }

            $parentNo = $parent->no;

            if ($jenis === 'Juklak' && $parent->jenis !== 'SOP') {
                return null;
            }
            if ($jenis === 'Juknis' && $parent->jenis !== 'Juklak') {
                return null;
            }

            $lastChild = self::where('jenis', $jenis)
                ->where('parent_id', $parentId)
                ->orderBy('id', 'DESC')
                ->first();

            if ($lastChild) {
                array_pop($parts = explode('-', $lastChild->no));
                $lastChildNumber = intval(end($parts)) + 1;
            } else {
                $lastChildNumber = 1;
            }

            return $parentNo . '-' . $lastChildNumber;
        }
    }

    /**
     * Get opsi parent berdasarkan jenis yang akan dibuat
     */
    public static function getParentOptions($jenis)
    {
        $result = [];

        if ($jenis === 'Juklak') {
            $result = self::where('jenis', 'SOP')
                ->whereNull('parent_id')
                ->orderBy('no', 'ASC')
                ->get()
                ->all();
        } elseif ($jenis === 'Juknis') {
            $result = self::where('jenis', 'Juklak')
                ->orderBy('no', 'ASC')
                ->get()
                ->all();
        }

        return self::sortByHierarchy($result);
    }

    /**
     * Get semua data dengan struktur hirarki terurut
     */
    public static function getAllWithHierarchy()
    {
        $result = self::orderBy('parent_id', 'ASC')
            ->orderBy('no', 'ASC')
            ->get()
            ->all();

        return self::sortByHierarchy($result);
    }

    /**
     * Sort data berdasarkan hierarki yang benar (Custom Comparator)
     */
    private static function sortByHierarchy(array $data): array
    {
        usort($data, function ($a, $b) {
            $partsA = array_map('intval', explode('-', $a->no));
            $partsB = array_map('intval', explode('-', $b->no));

            $minCount = min(count($partsA), count($partsB));

            for ($i = 0; $i < $minCount; $i++) {
                if ($partsA[$i] !== $partsB[$i]) {
                    return $partsA[$i] - $partsB[$i];
                }
            }

            return count($partsA) - count($partsB);
        });

        return $data;
    }
}