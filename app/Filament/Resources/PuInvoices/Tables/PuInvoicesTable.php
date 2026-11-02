<?php

namespace App\Filament\Resources\PuInvoices\Tables;

use App\Models\PuOrder;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class PuInvoicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
        ->query(
            PuOrder::query()
                ->select([
                    'pu_order.id as id',
                    'pu_order.created_at as pu_order_createdAt',
                    'pu_order.kode_order',
                    'pu_order.status',
                    'pu_order.total_order',
                ])
                ->withMax('invoices as ctc_nama', 'ctc_nama')
        )
        ->columns([
           TextColumn::make('kode_order')
                ->label('Kode Order')
                ->searchable()
                ->sortable(),
           TextColumn::make('ctc_nama')
                ->label('Nama Kontak')
                ->searchable(),
           TextColumn::make('total_order')
                ->label('Total Tagihan')
                ->money('IDR', true)
                ->sortable(),
           BadgeColumn::make('status')
                ->label('Status')
                ->formatStateUsing(fn ($state) => $state == 1 ? 'Aktif' : 'Nonaktif')
                ->colors([
                    'success' => 1,
                    'danger' => 0,
                ]),
           TextColumn::make('pu_order_createdAt')
                ->label('Tanggal')
                ->dateTime('d-m-Y'),
        ])
        // Opsional: Agar saat baris tabel diklik, langsung membuka modal detail
        ->actions([
            ViewAction::make('detail')
                ->iconButton()
                ->modalHeading('Informasi Detail Invoice & Order')
                ->modalWidth('2xl')
                // Menyesuaikan isi modal menggunakan Infolist Filament
                ->infolist([
                    Section::make('Informasi Utama')
                        ->schema([
                            TextEntry::make('kode_order')->label('Kode Order'),
                            TextEntry::make('ctc_nama')->label('Nama Kontak / Pelanggan'),
                            TextEntry::make('total_order')->label('Total Tagihan')->money('IDR', true),
                            TextEntry::make('status')
                                ->label('Status')
                                ->formatStateUsing(fn ($state) => $state == 1 ? 'Aktif' : 'Nonaktif')
                                ->badge()
                                ->color(fn ($state) => $state == 1 ? 'success' : 'danger'),
                            TextEntry::make('pu_order_createdAt')->label('Tanggal Dibuat')->dateTime('d F Y H:i'),
                        ])->columns(2),

                    // Jika ingin menampilkan rincian detail dari relasi invoice/details
                    Section::make('Rincian Detail Pesanan')
                        ->schema([
                            RepeatableEntry::make('invoices')
                                ->label('')
                                ->schema([
                                    TextEntry::make('kode_invoice')->label('Kode Invoice'),
                                    TextEntry::make('tgl_invoice')->label('Tanggal Invoice')->date('d-m-Y'),
                                    TextEntry::make('total_tagihan')->label('Tagihan')->money('IDR', true),
                                    TextEntry::make('keterangan')->label('Keterangan'),
                                ])->columns(2)
                        ])
                ])
        ], position: RecordActionsPosition::BeforeColumns)
        ->defaultSort('created_at', 'desc');
    }
}
