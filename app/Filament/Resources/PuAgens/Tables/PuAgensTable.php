<?php

namespace App\Filament\Resources\PuAgens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuAgensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('no_telp')
                    ->searchable(),
                TextColumn::make('alamat')
                    ->searchable(),
                TextColumn::make('kelurahan')
                    ->searchable(),
                TextColumn::make('kota')
                    ->searchable(),
                TextColumn::make('provinsi')
                    ->searchable(),
                ImageColumn::make('ktp')
                    ->disk('public')
                    // ->directory('folder-penyimpanan-foto')
                    ->searchable(),
                TextColumn::make('kode_referral')
                    ->searchable(),
                TextColumn::make('saldo')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('is_active')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()
                ->iconButton()
                ->authorize('update'),
                DeleteAction::make()
                ->iconButton()
                ->authorize('delete')
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
