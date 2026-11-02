<?php

namespace App\Filament\Resources\PuAgens\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PuAgenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('no_telp')
                    ->tel()
                    ->required(),
                TextInput::make('alamat')
                    ->required(),
                TextInput::make('kelurahan')
                    ->required(),
                TextInput::make('kota')
                    ->required(),
                TextInput::make('provinsi')
                    ->required(),
                TextInput::make('ktp')
                    ->default(null),
                TextInput::make('kode_referral')
                    ->required(),
                TextInput::make('saldo')
                    ->required()
                    ->numeric(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('is_active')
                    ->required()
                    ->numeric(),
            ]);
    }
}
