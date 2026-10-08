<?php

namespace App\Filament\Resources\KpsKontrakPkwts\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class KpsKontrakPkwtForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('no_perjanjian')
                    ->required(),
                TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                TextInput::make('npk')
                    ->required()
                    ->numeric(),
                DatePicker::make('jk_awal')
                    ->required(),
                DatePicker::make('jk_akhir')
                    ->required(),
                TextInput::make('hari')
                    ->required(),
                TextInput::make('tanggal')
                    ->required(),
                TextInput::make('bulan')
                    ->required(),
                TextInput::make('tahun')
                    ->required(),
                TextInput::make('jangka_waktu')
                    ->required(),
                TextInput::make('gaji')
                    ->required()
                    ->numeric(),
                TextInput::make('tj_pulsa')
                    ->required()
                    ->numeric(),
                TextInput::make('tj_ops')
                    ->required()
                    ->numeric(),
                TextInput::make('thr')
                    ->required(),
                TextInput::make('tj_kehadiran')
                    ->required()
                    ->numeric(),
                TextInput::make('insentif')
                    ->required(),
                TextInput::make('app_status')
                    ->required()
                    ->default('waiting'),
                DateTimePicker::make('app_date'),
                TextInput::make('app2_status')
                    ->required()
                    ->default('waiting'),
                DateTimePicker::make('app2_date'),
            ]);
    }
}
