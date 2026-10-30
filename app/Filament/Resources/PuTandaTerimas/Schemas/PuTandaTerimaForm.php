<?php

namespace App\Filament\Resources\PuTandaTerimas\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PuTandaTerimaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nomor')
                    ->required(),
                DatePicker::make('tanggal')
                    ->required(),
                TextInput::make('nama_pengirim')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('nama_penerima')
                    ->required(),
                Textarea::make('barang')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('qty')
                    ->required(),
                Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('foto')
                    ->required(),
                TextInput::make('user')
                    ->required(),
                DateTimePicker::make('modif')
                    ->required(),
            ]);
    }
}
