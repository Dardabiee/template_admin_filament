<?php

namespace App\Filament\Resources\PuLandArrangements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PuLandArrangementForm
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
                TextInput::make('keberangkatan')
                    ->required(),
                TextInput::make('kepulangan')
                    ->required(),
                Textarea::make('layanan_trmsk')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('layanan_tdk_trmsk')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('biaya')
                    ->required()
                    ->numeric(),
                Textarea::make('catatan')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
