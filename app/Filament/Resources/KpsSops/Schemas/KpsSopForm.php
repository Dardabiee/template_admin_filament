<?php

namespace App\Filament\Resources\KpsSops\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KpsSopForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no')
                    ->required(),
                Select::make('parent_id')
                    ->relationship('parent', 'id')
                    ->default(null),
                TextInput::make('jenis')
                    ->required(),
                TextInput::make('kode')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('file')
                    ->required(),
            ]);
    }
}
