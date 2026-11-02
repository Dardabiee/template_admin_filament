<?php

namespace App\Filament\Resources\PuLayanans\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PuLayananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_layanan')
                    ->required(),
            ]);
    }
}
