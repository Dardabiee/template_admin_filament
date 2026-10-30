<?php

namespace App\Filament\Resources\PuPenawarans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PuPenawaranForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no_arsip')
                    ->required(),
                TextInput::make('no_pelayanan')
                    ->required(),
                DatePicker::make('tgl_berlaku')
                    ->required(),
                TextInput::make('produk')
                    ->required(),
                TextInput::make('pelanggan')
                    ->required(),
                Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('tgl_keberangkatan')
                    ->required(),
                TextInput::make('durasi')
                    ->required()
                    ->numeric(),
                TextInput::make('berangkat_dari')
                    ->required(),
                TextInput::make('pkt_quad')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('pkt_triple')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('pkt_double')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('keberangkatan')
                    ->required(),
                TextInput::make('kepulangan')
                    ->required(),
                Textarea::make('notes')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
