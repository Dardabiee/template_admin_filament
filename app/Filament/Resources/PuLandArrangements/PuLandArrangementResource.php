<?php

namespace App\Filament\Resources\PuLandArrangements;

use App\Filament\Resources\PuLandArrangements\Pages\CreatePuLandArrangement;
use App\Filament\Resources\PuLandArrangements\Pages\EditPuLandArrangement;
use App\Filament\Resources\PuLandArrangements\Pages\ListPuLandArrangements;
use App\Filament\Resources\PuLandArrangements\Schemas\PuLandArrangementForm;
use App\Filament\Resources\PuLandArrangements\Tables\PuLandArrangementsTable;
use App\Models\PuLandArrangement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuLandArrangementResource extends Resource
{
    protected static ?string $model = PuLandArrangement::class;

    protected static ?string $navigationLabel = 'Penawaran LA';
    protected static ?string $modelLabel = ' Penawaran LA';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Penawaran LA';
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuLandArrangement';

    public static function form(Schema $schema): Schema
    {
        return PuLandArrangementForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuLandArrangementsTable::configure($table);
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
            'index' => ListPuLandArrangements::route('/'),
            'create' => CreatePuLandArrangement::route('/create'),
            'edit' => EditPuLandArrangement::route('/{record}/edit'),
        ];
    }
}
