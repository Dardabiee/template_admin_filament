<?php

namespace App\Filament\Resources\PuSurveys;

use App\Filament\Resources\PuSurveys\Pages\CreatePuSurvey;
use App\Filament\Resources\PuSurveys\Pages\EditPuSurvey;
use App\Filament\Resources\PuSurveys\Pages\ListPuSurveys;
use App\Filament\Resources\PuSurveys\Schemas\PuSurveyForm;
use App\Filament\Resources\PuSurveys\Tables\PuSurveysTable;
use App\Models\PuSurvey;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuSurveyResource extends Resource
{
    protected static ?string $model = PuSurvey::class;
     protected static ?string $navigationLabel = 'Survey';
    protected static ?string $modelLabel = 'View Survey';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Survey';
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuSurvey';

    public static function form(Schema $schema): Schema
    {
        return PuSurveyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuSurveysTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPuSurveys::route('/'),
            'create' => CreatePuSurvey::route('/create'),
            'edit' => EditPuSurvey::route('/{record}/edit'),
        ];
    }
}
