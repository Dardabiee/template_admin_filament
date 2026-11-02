<?php

namespace App\Filament\Resources\PuCustomers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PuCustomerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('group_id')
                    ->required(),
                TextInput::make('customer_id')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('jenis_kelamin')
                    ->required(),
                TextInput::make('no_hp')
                    ->required(),
                TextInput::make('asal')
                    ->required(),
                TextInput::make('paspor')
                    ->default(null),
                TextInput::make('kartu_kuning')
                    ->default(null),
                TextInput::make('ktp')
                    ->default(null),
                TextInput::make('kk')
                    ->default(null),
                TextInput::make('buku_nikah')
                    ->default(null),
                TextInput::make('akta_lahir')
                    ->default(null),
                TextInput::make('pas_foto')
                    ->default(null),
                TextInput::make('akun')
                    ->required(),
                TextInput::make('kode_referral')
                    ->default(null),
                TextInput::make('saldo')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('password')
                    ->password()
                    ->default(null),
                TextInput::make('is_active')
                    ->numeric()
                    ->default(null),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
            ]);
    }
}
