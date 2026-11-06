<?php

namespace App\Filament\Resources\SwInvoices\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SwInvoiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('letter_number')
                    ->required(),
                DatePicker::make('letter_date')
                    ->required(),
                TextInput::make('company_name')
                    ->required(),
                TextInput::make('event_type')
                    ->required(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                DatePicker::make('final_date'),
            ]);
    }
}
