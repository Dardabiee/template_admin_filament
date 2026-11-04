<?php

namespace App\Filament\Resources\PuSurveys\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PuSurveyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->default(null),
                DatePicker::make('tgl_keberangkatan'),
                TextInput::make('no_hp')
                    ->default(null),
                TextInput::make('q1')
                    ->required()
                    ->numeric(),
                TextInput::make('q2')
                    ->required()
                    ->numeric(),
                TextInput::make('q3')
                    ->required()
                    ->numeric(),
                TextInput::make('q4')
                    ->required()
                    ->numeric(),
                TextInput::make('q5')
                    ->required()
                    ->numeric(),
                TextInput::make('q6')
                    ->required()
                    ->numeric(),
                Textarea::make('q7')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('q8')
                    ->required()
                    ->numeric(),
                Textarea::make('q9')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('q10')
                    ->required()
                    ->numeric(),
                TextInput::make('q11')
                    ->required()
                    ->numeric(),
                TextInput::make('q12')
                    ->required()
                    ->numeric(),
                TextInput::make('q13')
                    ->required()
                    ->numeric(),
                TextInput::make('q14')
                    ->required()
                    ->numeric(),
                TextInput::make('q15')
                    ->required(),
                TextInput::make('q16')
                    ->required(),
                Textarea::make('q17')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('q18')
                    ->required()
                    ->numeric(),
            ]);
    }
}
