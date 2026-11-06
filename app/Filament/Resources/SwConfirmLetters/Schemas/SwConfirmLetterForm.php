<?php

namespace App\Filament\Resources\SwConfirmLetters\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class SwConfirmLetterForm
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
                TextInput::make('venue')
                    ->required(),
                TextInput::make('setup')
                    ->required(),
                DatePicker::make('start_date')
                    ->required(),
                DatePicker::make('end_date')
                    ->required(),
                TimePicker::make('start_time')
                    ->required(),
                TimePicker::make('end_time')
                    ->required(),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric(),
                TextInput::make('dp_percent')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('dp_date'),
                TextInput::make('final_percent')
                    ->numeric()
                    ->default(null),
                DateTimePicker::make('final_date'),
                TextInput::make('quotation')
                    ->default(null),
            ]);
    }
}
