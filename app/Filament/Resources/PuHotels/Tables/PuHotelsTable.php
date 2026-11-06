<?php

namespace App\Filament\Resources\PuHotels\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuHotelsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_hotel')
                    ->searchable(),
                TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('kota')
                    ->searchable(),
                TextColumn::make('negara')
                    ->searchable(),
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
                ->authorize('delete'),
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
