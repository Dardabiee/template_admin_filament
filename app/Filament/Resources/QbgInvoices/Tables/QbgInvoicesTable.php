<?php

namespace App\Filament\Resources\QbgInvoices\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class QbgInvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('tgl_invoice')
                    ->date()
                    ->sortable(),
                TextColumn::make('kode_invoice')
                    ->searchable(),
                
                TextColumn::make('nama_customer')
                    ->searchable(),
                // TextColumn::make('nomor_customer')
                //     ->searchable(),
                // TextColumn::make('email_customer')
                //     ->searchable(),
                TextColumn::make('alamat_customer')
                    ->searchable(),
                TextColumn::make('tgl_tempo')
                    ->date('d M Y')
                    ->sortable(),
                // TextColumn::make('jenis_harga')
                //     ->searchable(),
                // TextColumn::make('potongan_harga')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('ongkir')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('total')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('grand_total')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('payment_status')
                //     ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable(),
                    // ->toggleable(isToggledHiddenByDefault: true),
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
            ->filters([
                //
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                ViewAction::make()
                ->iconButton(),
                EditAction::make()
                ->iconButton(),
                DeleteAction::make()
                ->iconButton(),
            ], position: RecordActionsPosition::BeforeColumns)
            ;
    }
}
