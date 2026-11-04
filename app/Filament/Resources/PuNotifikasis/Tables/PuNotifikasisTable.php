<?php

namespace App\Filament\Resources\PuNotifikasis\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuNotifikasisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_notifikasi')
                    ->searchable(),
                TextColumn::make('user.fullname')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('jabatan')
                    ->searchable(),
                TextColumn::make('departemen')
                    ->searchable(),
                TextColumn::make('pengajuan')
                    ->searchable(),
                TextColumn::make('tgl_notifikasi')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('alasan')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable(),
                // TextColumn::make('app_hc_name')
                //     ->searchable(),
                // TextColumn::make('app_hc_status')
                //     ->searchable(),
                // TextColumn::make('app_hc_date')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('app2_name')
                //     ->searchable(),
                // TextColumn::make('app2_status')
                //     ->searchable(),
                // TextColumn::make('app2_date')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()
                ->iconButton(),
                EditAction::make()
                ->iconButton(),
                DeleteAction::make()
                ->iconButton()
            ], position: RecordActionsPosition::BeforeColumns);
            // ->toolbarActions([
            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ]);
    }
}
