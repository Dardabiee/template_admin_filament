<?php

namespace App\Filament\Resources\KpsKaryawans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class KpsKaryawansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_user')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nama_lengkap')
                    ->searchable(),
                TextColumn::make('jenis_kelamin')
                    ->searchable(),
                TextColumn::make('status_kerja')
                    ->searchable(),
                TextColumn::make('npk')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('foto')
                    ->searchable(),
                TextColumn::make('kk')
                    ->searchable(),
                TextColumn::make('ktp')
                    ->searchable(),
                TextColumn::make('npwp')
                    ->searchable(),
                // TextColumn::make('ijazah')
                //     ->searchable(),
                // TextColumn::make('tempat_lahir')
                //     ->searchable(),
                // TextColumn::make('tgl_lahir')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('umur')
                //     ->searchable(),
                // TextColumn::make('pendidikan')
                //     ->searchable(),
                // TextColumn::make('no_ktp')
                //     ->searchable(),
                // TextColumn::make('status_pernikahan')
                //     ->searchable(),
                // TextColumn::make('ktk')
                //     ->searchable(),
                // TextColumn::make('alamat_ktp')
                //     ->searchable(),
                // TextColumn::make('domisili')
                //     ->searchable(),
                // TextColumn::make('telp_klrga_serumah')
                //     ->searchable(),
                // TextColumn::make('telp_klrga_tdk_serumah')
                //     ->searchable(),
                // TextColumn::make('gol_darah')
                //     ->searchable(),
                // TextColumn::make('no_hp')
                //     ->searchable(),
                // TextColumn::make('lokasi_kerja')
                //     ->searchable(),
                // TextColumn::make('wilayah_kerja')
                //     ->searchable(),
                // TextColumn::make('unit_bisnis')
                //     ->searchable(),
                // TextColumn::make('posisi')
                //     ->searchable(),
                // TextColumn::make('jabatan')
                //     ->searchable(),
                // TextColumn::make('department')
                //     ->searchable(),
                // TextColumn::make('grade')
                //     ->searchable(),
                // TextColumn::make('status_karyawan')
                //     ->searchable(),
                // TextColumn::make('tgl_masuk')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('tgl_rekrut')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('tgl_permanen')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('tgl_akhir_kontrak')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('tgl_phk')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('masa_kerja')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('total_bulan')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('no_rek')
                //     ->searchable(),
                // TextColumn::make('nama_pemilik_rek')
                //     ->searchable(),
                // TextColumn::make('nama_bank')
                //     ->searchable(),
                // TextColumn::make('asal_karyawan')
                //     ->searchable(),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()->iconButton(),
                EditAction::make()->iconButton(),
            ],position: RecordActionsPosition::BeforeCells)
             
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
