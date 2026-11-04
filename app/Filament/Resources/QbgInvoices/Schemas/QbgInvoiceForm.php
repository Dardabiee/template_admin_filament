<?php

namespace App\Filament\Resources\QbgInvoices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class QbgInvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('tgl_invoice')
                    ->required(),
                TextInput::make('kode_invoice')
                    ->required(),
                DatePicker::make('tgl_tempo')
                    ->required(),
                TextInput::make('nama_customer')
                    ->required(),
                TextInput::make('nomor_customer')
                    ->required(),
                TextInput::make('email_customer')
                    ->email()
                    ->default(null),
                TextInput::make('alamat_customer')
                    ->required(),
                TextInput::make('jenis_harga')
                    ->required(),
                TextInput::make('potongan_harga')
                    ->numeric()
                    ->default(null),
                TextInput::make('ongkir')
                    ->numeric()
                    ->default(null),
                TextInput::make('total')
                    ->required()
                    ->numeric(),
                TextInput::make('grand_total')
                    ->required()
                    ->numeric(),
                Textarea::make('keterangan')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('payment_status')
                    ->required()
                    ->default('unpaid'),
                TextInput::make('created_by')
                    ->required()
                    ->numeric(),
                TextInput::make('updated_by')
                    ->required()
                    ->numeric(),
            ]);
    }
}
