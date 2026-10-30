<?php

namespace App\Filament\Resources\PuPenawarans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuPenawaransTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('no_arsip')
                    ->searchable(),
                TextColumn::make('no_pelayanan')
                    ->searchable(),
                TextColumn::make('tgl_berlaku')
                    ->date()
                    ->sortable(),
                TextColumn::make('produk')
                    ->searchable(),
                TextColumn::make('pelanggan')
                    ->searchable(),
                TextColumn::make('tgl_keberangkatan')
                    ->date()
                    ->sortable(),
                TextColumn::make('durasi')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('berangkat_dari')
                    ->searchable(),
                TextColumn::make('pkt_quad')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pkt_triple')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('pkt_double')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('keberangkatan')
                    ->searchable(),
                TextColumn::make('kepulangan')
                    ->searchable(),
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
            ->actions([
                DeleteAction::make()
                ->iconButton(),
                EditAction::make()
                ->iconButton(),
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
