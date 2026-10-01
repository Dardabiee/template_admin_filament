<?php

namespace App\Filament\Resources\Userlevels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class UserlevelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('level_name')
                    ->required(),
            ]);
    }
}
