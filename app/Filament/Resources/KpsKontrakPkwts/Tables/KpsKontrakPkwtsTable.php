<?php

namespace App\Filament\Resources\KpsKontrakPkwts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class KpsKontrakPkwtsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_perjanjian')
                    ->searchable(),
                TextColumn::make('id_user')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('npk')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jk_awal')
                    ->date()
                    ->sortable(),
                TextColumn::make('jk_akhir')
                    ->date()
                    ->sortable(),
                TextColumn::make('hari')
                    ->searchable(),
                TextColumn::make('tanggal')
                    ->searchable(),
                TextColumn::make('bulan')
                    ->searchable(),
                TextColumn::make('tahun')
                    ->searchable(),
                TextColumn::make('jangka_waktu')
                    ->searchable(),
                TextColumn::make('gaji')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tj_pulsa')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tj_ops')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('thr')
                    ->searchable(),
                TextColumn::make('tj_kehadiran')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('insentif')
                    ->searchable(),
                TextColumn::make('app_status')
                    ->searchable(),
                TextColumn::make('app_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('app2_status')
                    ->searchable(),
                TextColumn::make('app2_date')
                    ->dateTime()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
