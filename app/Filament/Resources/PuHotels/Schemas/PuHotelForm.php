<?php

namespace App\Filament\Resources\PuHotels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PuHotelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_hotel')
                    ->tel()
                    ->required(),
                TextInput::make('rating')
                    ->required()
                    ->numeric(),
                TextInput::make('kota')
                    ->required(),
                TextInput::make('negara')
                    ->required(),
            ]);
    }
}
