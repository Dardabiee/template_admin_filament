<?php

namespace App\Filament\Resources\KpsDeklarasis\Tables;

use App\Filament\Resources\KpsDeklarasis\Pages\ViewKpsDeklarasi;
use App\Models\KpsDeklarasi;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class KpsDeklarasisTable
{   
     protected static ?string $model = KpsDeklarasi::class;

    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_deklarasi')
                    ->searchable(),
                TextColumn::make('tgl_deklarasi')
                    ->date()
                    ->sortable(),
                TextColumn::make('id_pengaju')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('nama_dibayar')
                    ->searchable(),
                TextColumn::make('tujuan')
                    ->searchable(),
                TextColumn::make('sebesar')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('app_name')
                //     ->searchable(),
                // TextColumn::make('app_status')
                //     ->searchable(),
                // TextColumn::make('app_date')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('app2_name')
                //     ->searchable(),
                // TextColumn::make('app2_status')
                //     ->searchable(),
                // TextColumn::make('app2_date')
                //     ->dateTime()
                //     ->sortable(),
                TextColumn::make('status')
                    ->searchable(),
                TextColumn::make('is_active')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->Actions([
                ViewAction::make()
                ->iconButton()
                ->url(fn ($record): string => ViewKpsDeklarasi::getUrl([$record->getKey()])),
            ], position: RecordActionsPosition::AfterCells)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
