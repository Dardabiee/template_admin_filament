<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SwConfirmLetter extends Model
{
    protected $connection = 'sw';

    protected $table = 'sw_confirm_letter';
    protected $primaryKey = 'id';
    public $timestamps = false; // Menyesuaikan tabel legacy CI3

    protected $guarded = [];

    /**
     * Relasi ke Detail Confirmation Letter (sw_confirm_letter_detail)
     */
    public function details(): HasMany
    {
        return $this->hasMany(SwConfirmLetterDetail::class, 'letter_id', 'id');
    }

    /**
     * Mengambil data cetak berdasarkan ID beserta pengelompokan item 
     * (Menggantikan get_by_id_print di CI3)[cite: 8]
     */
    public static function getByIdPrint($id)
    {
        $header = self::with('details')->find($id);

        if (!$header) {
            return null;
        }

        $package = [];
        $additional = [];

        foreach ($header->details as $row) {
            if ($row->item_type === 'package') {
                $package[] = $row;
            } elseif ($row->item_type === 'additional') {
                $additional[] = $row;
            }
        }

        // Menyematkan properti tambahan agar kompatibel jika digunakan pada view cetak lama
        $header->package = $package;
        $header->additional = $additional;

        return $header;
    }
}