<?php

namespace App\Filament\Resources\BmnSurveys;

use App\Filament\Resources\BmnSurveys\Pages\CreateBmnSurvey;
use App\Filament\Resources\BmnSurveys\Pages\EditBmnSurvey;
use App\Filament\Resources\BmnSurveys\Pages\ListBmnSurveys;
use App\Filament\Resources\BmnSurveys\Schemas\BmnSurveyForm;
use App\Filament\Resources\BmnSurveys\Tables\BmnSurveysTable;
use App\Models\BmnSurvey;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BmnSurveyResource extends Resource
{
    protected static ?string $model = BmnSurvey::class;
    protected static ?string $navigationLabel = 'Survey';
    protected static ?string $modelLabel = 'View Survey';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Survey';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'BmnSurvey';

    public static function form(Schema $schema): Schema
    {
        return BmnSurveyForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BmnSurveysTable::configure($table);
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
            'index' => ListBmnSurveys::route('/'),
            'create' => CreateBmnSurvey::route('/create'),
            'edit' => EditBmnSurvey::route('/{record}/edit'),
        ];
    }
}
