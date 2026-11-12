<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PuSop extends Model
{   
    protected $connection = 'sw';

    protected $table = 'pu_sop';
    protected $primaryKey = 'id';
    public $timestamps = false; // Menyesuaikan tabel legacy CI3

    protected $guarded = [];

    /**
     * Relasi Parent (Self-Referential)
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(PuSop::class, 'parent_id', 'id');
    }

    /**
     * Relasi Children
     */
    public function children(): HasMany
    {
        return $this->hasMany(PuSop::class, 'parent_id', 'id');
    }

    /**
     * Mengambil data berdasarkan ID (Menggantikan get_by_id di CI3)
     */
    public static function getById($id)
    {
        $result = self::with('parent')->find($id);
        if ($result && $result->parent) {
            $result->parent_no = $result->parent->no;
        }
        return $result;
    }

    /**
     * Generator Kode Otomatis berdasarkan Jenis
     */
    public static function generateKode($jenis): string
    {
        $prefixMap = [
            'SOP' => 'SOP',
            'Juklak' => 'JKL',
            'Juknis' => 'JKN',
            'SK Penunjang' => 'SKP'
        ];

        $prefix = $prefixMap[$jenis] ?? 'SOP';

        $lastRecord = self::where('jenis', $jenis)
            ->orderBy('id', 'DESC')
            ->first();

        $newNumber = $lastRecord ? intval(substr($lastRecord->kode, -4)) + 1 : 1;

        return $prefix . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Generator Nomor Hierarki
     */
    public static function generateNoHierarki($jenis, $parentId = null): ?string
    {
        if ($jenis === 'SOP') {
            $lastNo = self::where('jenis', 'SOP')
                ->whereNull('parent_id')
                ->orderBy('id', 'DESC')
                ->value('no');

            return (string) ($lastNo ? intval($lastNo) + 1 : 1);
        }

        if (!$parentId) {
            return null;
        }

        $parent = self::find($parentId);
        if (!$parent) {
            return null;
        }

        $lastChildNo = self::where('jenis', $jenis)
            ->where('parent_id', $parentId)
            ->orderBy('id', 'DESC')
            ->value('no');

        if ($lastChildNo) {
            $parts = explode('-', $lastChildNo);
            $lastChildNumber = intval(end($parts)) + 1;
            array_pop($parts);
            $parts[] = $lastChildNumber;
            return implode('-', $parts);
        }

        return $parent->no . '-1';
    }
}