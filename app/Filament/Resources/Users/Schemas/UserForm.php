<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;


class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                Select::make('roles')
                    ->relationship('roles', 'name')
                    ->preload()
                    ->searchable()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                Toggle::make('is_active')
                      ->label('Status Aktif')
                      ->default('N')
                      ->onColor('success')
                      ->offColor('danger')
                      ->formatStateUsing(fn ($state) => $state === 'Y')
                      // Mengubah state true/false dari form kembali menjadi 'Y'/'N' saat disimpan ke database
                     ->dehydrateStateUsing(fn ($state) => $state ? 'Y' : 'N'),
            ]);
    }
}
