<?php

namespace App\Filament\Resources\PuInvoices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PuInvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('order_id')
                    ->relationship('order', 'id')
                    ->required(),
                TextInput::make('travel_id')
                    ->required()
                    ->numeric(),
                DatePicker::make('tgl_invoice')
                    ->required(),
                TextInput::make('kode_invoice')
                    ->required(),
                DatePicker::make('tgl_tempo')
                    ->required(),
                TextInput::make('diskon')
                    ->required()
                    ->numeric(),
                TextInput::make('total_tagihan')
                    ->required()
                    ->numeric(),
                TextInput::make('total_order')
                    ->required()
                    ->numeric(),
                TextInput::make('ctc_nama')
                    ->required(),
                Textarea::make('jamaah')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('ctc_alamat')
                    ->required(),
                TextInput::make('ctc_email')
                    ->email()
                    ->required(),
                Textarea::make('detail_pesanan')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('is_active')
                    ->required()
                    ->numeric()
                    ->default(1),
                TextInput::make('status')
                    ->required()
                    ->numeric()
                    ->default(1),
            ]);
    }
}
