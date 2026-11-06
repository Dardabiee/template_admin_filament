<?php

namespace App\Filament\Resources\PuCustomers\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuCustomersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('customer_id')
                    ->searchable(),
                TextColumn::make('group_id')
                    ->searchable(),
                TextColumn::make('nama')
                    ->searchable(),
                TextColumn::make('jenis_kelamin')
                    ->searchable(),
                TextColumn::make('no_hp')
                    ->searchable(),
                TextColumn::make('transaksi.tgl_keberangkatan')
                    ->label('Tanggal Keberangkatan')
                    ->date('d M Y'),
                TextColumn::make('transaksi.produk')
                    ->label('Produk')
                    ->searchable(),
                TextColumn::make('transaksi.travel')
                    ->label('Travel')
                    ->searchable(),
                // TextColumn::make('title')
                //     ->searchable(),
                // TextColumn::make('asal')
                //     ->searchable(),
                // TextColumn::make('paspor')
                //     ->searchable(),
                // TextColumn::make('kartu_kuning')
                //     ->searchable(),
                // TextColumn::make('ktp')
                //     ->searchable(),
                // TextColumn::make('kk')
                //     ->searchable(),
                // TextColumn::make('buku_nikah')
                //     ->searchable(),
                // TextColumn::make('akta_lahir')
                //     ->searchable(),
                // TextColumn::make('pas_foto')
                //     ->searchable(),
                // TextColumn::make('akun')
                //     ->searchable(),
                // TextColumn::make('kode_referral')
                //     ->searchable(),
                // TextColumn::make('saldo')
                //     ->numeric()
                //     ->sortable(),
                // TextColumn::make('is_active')
                //     ->numeric()
                //     ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('created_by')
                //     ->numeric()
                //     ->sortable(),
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
                ->authorize('delete')
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
