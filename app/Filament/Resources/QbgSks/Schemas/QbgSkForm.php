<?php

namespace App\Filament\Resources\QbgSks\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class QbgSkForm
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
