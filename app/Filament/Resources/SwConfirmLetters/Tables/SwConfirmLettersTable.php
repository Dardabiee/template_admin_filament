<?php

namespace App\Filament\Resources\SwConfirmLetters\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class SwConfirmLettersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('letter_number')
                    ->searchable(),
                TextColumn::make('company_name')
                    ->searchable(),
                // TextColumn::make('letter_date')
                //     ->date()
                //     ->sortable(),
                TextColumn::make('event_type')
                    ->searchable(),
                // TextColumn::make('venue')
                //     ->searchable(),
                // TextColumn::make('setup')
                //     ->searchable(),
                // TextColumn::make('start_date')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('end_date')
                //     ->date()
                //     ->sortable(),
                // TextColumn::make('start_time')
                //     ->time()
                //     ->sortable(),
                // TextColumn::make('end_time')
                //     ->time()
                //     ->sortable(),
                // TextColumn::make('total_amount')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('dp_percent')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('dp_date')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('final_percent')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('final_date')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('quotation')
                //     ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()
                ->iconButton(),
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
