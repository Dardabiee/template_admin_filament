<?php

namespace App\Filament\Resources\MacSks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MacSkForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_file')
                    ->required(),
                TextInput::make('file')
                    ->required(),
            ]);
    }
}
