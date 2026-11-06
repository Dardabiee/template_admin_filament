<?php

namespace App\Filament\Resources\SwDeklarasis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SwDeklarasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_deklarasi')
                    ->required(),
                DatePicker::make('tgl_deklarasi'),
                TextInput::make('id_pengaju')
                    ->required()
                    ->numeric(),
                Textarea::make('jabatan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('nama_dibayar')
                    ->required(),
                Textarea::make('tujuan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('sebesar')
                    ->required()
                    ->numeric(),
                TextInput::make('app_name')
                    ->default(null),
                TextInput::make('app_status')
                    ->required()
                    ->default('waiting'),
                Textarea::make('app_keterangan')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('app_date'),
                TextInput::make('app2_name')
                    ->default(null),
                TextInput::make('app2_status')
                    ->default('waiting'),
                Textarea::make('app2_keterangan')
                    ->required()
                    ->columnSpanFull(),
                DateTimePicker::make('app2_date'),
                TextInput::make('app4_name')
                    ->default(null),
                TextInput::make('app4_status')
                    ->required()
                    ->default('waiting'),
                DateTimePicker::make('app4_date'),
                Textarea::make('app4_keterangan')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->required()
                    ->default('on-process'),
                TextInput::make('is_active')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
