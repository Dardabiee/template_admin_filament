<?php

namespace App\Filament\Resources\PuTandaTerimas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuTandaTerimasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor')
                    ->searchable(),
                TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                TextColumn::make('nama_pengirim')
                    ->searchable(),
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('nama_penerima')
                    ->searchable(),
                TextColumn::make('qty')
                    ->searchable(),
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    // ->directory('folder-penyimpanan-foto')
                    ->searchable(),
                // TextColumn::make('user')
                //     ->searchable(),
                // TextColumn::make('modif')
                //     ->dateTime()
                //     ->sortable(),
            ])
            ->filters([
                //
            ])
             ->actions([
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
