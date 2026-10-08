<?php

namespace App\Filament\Resources\KpsPrepayments\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class KpsPrepaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode_prepayment')
                    ->required(),
                TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                TextInput::make('jabatan')
                    ->required(),
                TextInput::make('divisi')
                    ->required(),
                TextInput::make('prepayment')
                    ->required(),
                Textarea::make('tujuan')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('tgl_prepayment')
                    ->required(),
                TextInput::make('total_nominal')
                    ->numeric()
                    ->default(null),
                TextInput::make('no_rek')
                    ->default(null),
                TextInput::make('payment_status')
                    ->required()
                    ->default('unpaid'),
                DateTimePicker::make('tgl_pembayaran')
                    ->required(),
                TextInput::make('attachment')
                    ->default(null),
                TextInput::make('app_name')
                    ->default(null),
                TextInput::make('app_status')
                    ->default('waiting'),
                DateTimePicker::make('app_date'),
                Textarea::make('app_keterangan')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('app2_name')
                    ->default(null),
                TextInput::make('app2_status')
                    ->default('waiting'),
                DateTimePicker::make('app2_date'),
                Textarea::make('app2_keterangan')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->default('on-process'),
                TextInput::make('is_active')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
