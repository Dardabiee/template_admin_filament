<?php

namespace App\Filament\Resources\PuProdukAgens\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PuProdukAgenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('is_active')
                    ->required()
                    ->numeric(),
                TextInput::make('nama_produk')
                    ->required(),
                TextInput::make('travel')
                    ->required(),
                DatePicker::make('tanggal_keberangkatan')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->required(),
                TextInput::make('harga_paket')
                    ->required()
                    ->numeric(),
                TextInput::make('fee_agen')
                    ->required()
                    ->numeric(),
                TextInput::make('sisa_seat')
                    ->required(),
            ]);
    }
}
