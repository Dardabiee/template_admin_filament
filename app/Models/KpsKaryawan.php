<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KpsKaryawan extends Model
{
    //
    protected $connection = 'sw';
    protected $table = 'kps_karyawan';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'npk',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'umur',
        'id_user',
    ];

    public function kontrakPkwt(): HasMany
    {
        return $this->hasMany(KpsKontrakPkwt::class, 'npk', 'npk');
    }
}

