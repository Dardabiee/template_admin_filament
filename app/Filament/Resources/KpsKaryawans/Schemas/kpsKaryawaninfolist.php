<?php

namespace App\Filament\Resources\KpsKaryawans\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;

class KpsKaryawanInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Pribadi')
                    ->schema([
                        Grid::make(['md' => 3])
                            ->schema([
                                TextEntry::make('nama_lengkap')
                                    ->weight(FontWeight::Bold),
                                TextEntry::make('jenis_kelamin') ->weight(FontWeight::Bold),
                                TextEntry::make('tempat_lahir') ->weight(FontWeight::Bold),
                                TextEntry::make('tgl_lahir')->date() ->weight(FontWeight::Bold),
                                TextEntry::make('umur') ->weight(FontWeight::Bold),
                                TextEntry::make('gol_darah') ->weight(FontWeight::Bold),
                                TextEntry::make('status_pernikahan') ->weight(FontWeight::Bold) ->weight(FontWeight::Bold),
                                TextEntry::make('pendidikan')->weight(FontWeight::Bold),
                            ]),
                    ]),
                Section::make('Kontak & Alamat')
                    ->schema([
                        Grid::make(['md' => 2])
                            ->schema([
                                TextEntry::make('no_hp')->weight(FontWeight::Bold),
                                TextEntry::make('alamat_ktp')->weight(FontWeight::Bold),
                                TextEntry::make('domisili')->weight(FontWeight::Bold),
                                TextEntry::make('telp_klrga_serumah')->weight(FontWeight::Bold),
                                TextEntry::make('telp_klrga_tdk_serumah')->weight(FontWeight::Bold),
                            ]),
                    ]),
                Section::make('Informasi Pekerjaan')
                    ->schema([
                        Grid::make(['md' => 3])
                            ->schema([
                                TextEntry::make('npk')->numeric(),
                                TextEntry::make('status_karyawan')->weight(FontWeight::Bold),
                                TextEntry::make('lokasi_kerja')->weight(FontWeight::Bold),
                                TextEntry::make('wilayah_kerja')->weight(FontWeight::Bold),
                                TextEntry::make('unit_bisnis')->weight(FontWeight::Bold),
                                TextEntry::make('posisi')->weight(FontWeight::Bold),
                                TextEntry::make('jabatan')->weight(FontWeight::Bold),
                                TextEntry::make('department'),
                                TextEntry::make('grade')->weight(FontWeight::Bold),
                                TextEntry::make('tgl_masuk')->date()->weight(FontWeight::Bold),
                                TextEntry::make('tgl_rekrut')->date()->weight(FontWeight::Bold),
                                TextEntry::make('tgl_permanen')->date()->weight(FontWeight::Bold),
                                TextEntry::make('tgl_akhir_kontrak')->date()->weight(FontWeight::Bold),
                                TextEntry::make('masa_kerja')->numeric()->weight(FontWeight::Bold),
                            ]),
                    ]),
                Section::make('Dokumen & Perbankan')
                    ->schema([
                        Grid::make(['md' => 3])
                            ->schema([
                                TextEntry::make('no_ktp')->weight(FontWeight::Bold),
                                TextEntry::make('npwp')->weight(FontWeight::Bold),
                                TextEntry::make('no_rek')->weight(FontWeight::Bold),
                                TextEntry::make('nama_pemilik_rek')->weight(FontWeight::Bold),
                                TextEntry::make('nama_bank')->weight(FontWeight::Bold),
                            ]),
                    ]),
            ]);
    }
}
