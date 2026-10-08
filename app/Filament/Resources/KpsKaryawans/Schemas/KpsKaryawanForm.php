<?php

namespace App\Filament\Resources\KpsKaryawans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KpsKaryawanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                TextInput::make('status_kerja')
                    ->required(),
                TextInput::make('npk')
                    ->required()
                    ->numeric(),
                TextInput::make('foto')
                    ->required(),
                TextInput::make('kk')
                    ->required(),
                TextInput::make('ktp')
                    ->required(),
                TextInput::make('npwp')
                    ->default(null),
                TextInput::make('ijazah')
                    ->required(),
                TextInput::make('nama_lengkap')
                    ->required(),
                TextInput::make('jenis_kelamin')
                    ->required(),
                TextInput::make('tempat_lahir')
                    ->required(),
                DatePicker::make('tgl_lahir')
                    ->required(),
                TextInput::make('umur')
                    ->required(),
                TextInput::make('pendidikan')
                    ->required(),
                TextInput::make('no_ktp')
                    ->required(),
                TextInput::make('status_pernikahan')
                    ->required(),
                TextInput::make('ktk')
                    ->required(),
                TextInput::make('alamat_ktp')
                    ->required(),
                TextInput::make('domisili')
                    ->required(),
                TextInput::make('telp_klrga_serumah')
                    ->tel()
                    ->required(),
                TextInput::make('telp_klrga_tdk_serumah')
                    ->tel()
                    ->required(),
                TextInput::make('gol_darah')
                    ->required(),
                TextInput::make('no_hp')
                    ->required(),
                TextInput::make('lokasi_kerja')
                    ->required(),
                TextInput::make('wilayah_kerja')
                    ->required(),
                TextInput::make('unit_bisnis')
                    ->required(),
                TextInput::make('posisi')
                    ->required(),
                TextInput::make('jabatan')
                    ->required(),
                TextInput::make('department')
                    ->required(),
                TextInput::make('grade')
                    ->required(),
                TextInput::make('status_karyawan')
                    ->required(),
                DatePicker::make('tgl_masuk'),
                DatePicker::make('tgl_rekrut'),
                DatePicker::make('tgl_permanen'),
                DatePicker::make('tgl_akhir_kontrak'),
                DatePicker::make('tgl_phk'),
                TextInput::make('masa_kerja')
                    ->required()
                    ->numeric(),
                TextInput::make('total_bulan')
                    ->required()
                    ->numeric(),
                TextInput::make('no_rek')
                    ->required(),
                TextInput::make('nama_pemilik_rek')
                    ->required(),
                TextInput::make('nama_bank')
                    ->required(),
                TextInput::make('asal_karyawan')
                    ->required(),
                Textarea::make('keahlian')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('pelatihan_internal')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('pelatihan_eksternal')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
