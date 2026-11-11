<?php

namespace App\Filament\Resources\BmnSurveys\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class BmnSurveyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->default(null),
                DatePicker::make('tgl_pernikahan'),
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
                TextInput::make('q7')
                    ->required()
                    ->numeric(),
                TextInput::make('q8')
                    ->required()
                    ->numeric(),
                TextInput::make('q9')
                    ->required()
                    ->numeric(),
                TextInput::make('q10')
                    ->required()
                    ->numeric(),
                Textarea::make('kritik_saran')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
