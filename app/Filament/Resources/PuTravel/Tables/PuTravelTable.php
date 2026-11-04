<?php

namespace App\Filament\Resources\PuTravel\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuTravelTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('perusahaan')
                    ->searchable(),
                TextColumn::make('travel')
                    ->searchable(),
                TextColumn::make('nama_bank')
                    ->searchable(),
                TextColumn::make('no_rek')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
