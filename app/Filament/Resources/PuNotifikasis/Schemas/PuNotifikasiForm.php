<?php

namespace App\Filament\Resources\PuNotifikasis\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PuNotifikasiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_notifikasi')
                    ->required(),
                TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                TextInput::make('jabatan')
                    ->required(),
                TextInput::make('departemen')
                    ->required(),
                TextInput::make('pengajuan')
                    ->required(),
                DatePicker::make('tgl_notifikasi')
                    ->required(),
                TextInput::make('waktu')
                    ->required(),
                Textarea::make('alasan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->default('on-process'),
                Textarea::make('catatan')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('app_hc_name')
                    ->default(null),
                TextInput::make('app_hc_status')
                    ->required()
                    ->default('waiting'),
                Textarea::make('app_hc_keterangan')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('app_hc_date'),
                TextInput::make('app2_name')
                    ->default(null),
                TextInput::make('app2_status')
                    ->required()
                    ->default('waiting'),
                Textarea::make('app2_keterangan')
                    ->default(null)
                    ->columnSpanFull(),
                DateTimePicker::make('app2_date'),
            ]);
    }
}
