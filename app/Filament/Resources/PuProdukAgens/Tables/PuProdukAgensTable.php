<?php

namespace App\Filament\Resources\PuProdukAgens\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuProdukAgensTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('is_active')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nama_produk')
                    ->searchable(),
                TextColumn::make('travel')
                    ->searchable(),
                TextColumn::make('tanggal_keberangkatan')
                    ->date()
                    ->sortable(),
                ImageColumn::make('image'),
                TextColumn::make('harga_paket')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('fee_agen')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('sisa_seat')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                ->iconButton(),
                DeleteAction::make()
                ->iconButton()
            ], position: RecordActionsPosition::BeforeColumns)
            // ->toolbarActions([
            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ])
            ;
    }
}
