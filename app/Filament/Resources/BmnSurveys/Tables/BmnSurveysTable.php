<?php

namespace App\Filament\Resources\BmnSurveys\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class BmnSurveysTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('tgl_pernikahan')
                    ->date()
                    ->sortable(),
                TextColumn::make('no_hp')
                    ->searchable(),
                // TextColumn::make('q1')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q2')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q3')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q4')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q5')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q6')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q7')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q8')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q9')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('q10')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                EditAction::make()
                ->iconButton()
                ->authorize('update'),
                DeleteAction::make()
                ->iconButton()
                ->authorize('delete')
            ], position:RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
