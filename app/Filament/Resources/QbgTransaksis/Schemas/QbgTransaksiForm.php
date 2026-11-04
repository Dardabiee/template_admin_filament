<?php

namespace App\Filament\Resources\QbgTransaksis\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QbgTransaksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('invoice_id')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('detail_invoice_id')
                    ->numeric()
                    ->default(0),
                TextInput::make('kode_produk')
                    ->required(),
                TextInput::make('jenis_transaksi')
                    ->required(),
                TextInput::make('jumlah')
                    ->required()
                    ->numeric(),
                TextInput::make('keterangan')
                    ->required(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
            ]);
    }
}
