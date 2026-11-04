<?php

namespace App\Filament\Resources\QbgProduks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class QbgProduksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_produk')
                    ->searchable(),
                TextColumn::make('nama_produk')
                    ->searchable(),
                TextColumn::make('berat')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('satuan')
                    ->searchable(),
                TextColumn::make('harga_qubagift')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('harga_reseller')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('harga_distributor')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('stok_akhir')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('created_by')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('updated_by')
                //     ->numeric()
                //     ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                EditAction::make()
                ->iconButton(),
                DeleteAction::make()
                ->iconButton(),
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
