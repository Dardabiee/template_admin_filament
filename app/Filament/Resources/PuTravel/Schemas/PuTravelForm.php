<?php

namespace App\Filament\Resources\PuTravel\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PuTravelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('perusahaan')
                    ->default(null),
                TextInput::make('travel')
                    ->required(),
                TextInput::make('nama_bank')
                    ->required(),
                TextInput::make('no_rek')
                    ->required(),
            ]);
    }
}
