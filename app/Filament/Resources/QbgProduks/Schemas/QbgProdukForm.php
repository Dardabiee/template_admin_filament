<?php

namespace App\Filament\Resources\QbgProduks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QbgProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_produk')
                    ->required(),
                TextInput::make('nama_produk')
                    ->required(),
                TextInput::make('berat')
                    ->required()
                    ->numeric(),
                TextInput::make('satuan')
                    ->required(),
                TextInput::make('harga_qubagift')
                    ->required()
                    ->numeric(),
                TextInput::make('harga_reseller')
                    ->required()
                    ->numeric(),
                TextInput::make('harga_distributor')
                    ->required()
                    ->numeric(),
                TextInput::make('stok_akhir')
                    ->required()
                    ->numeric(),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->numeric()
                    ->default(null),
            ]);
    }
}
