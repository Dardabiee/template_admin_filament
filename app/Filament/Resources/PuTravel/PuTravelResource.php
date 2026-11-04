<?php

namespace App\Filament\Resources\PuTravel;

use App\Filament\Resources\PuTravel\Pages\CreatePuTravel;
use App\Filament\Resources\PuTravel\Pages\EditPuTravel;
use App\Filament\Resources\PuTravel\Pages\ListPuTravel;
use App\Filament\Resources\PuTravel\Schemas\PuTravelForm;
use App\Filament\Resources\PuTravel\Tables\PuTravelTable;
use App\Models\PuTravel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuTravelResource extends Resource
{
    protected static ?string $model = PuTravel::class;

    protected static ?string $navigationLabel = 'Travel';
    protected static ?string $modelLabel = 'View Travel';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Travel';
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuTravel';

    public static function form(Schema $schema): Schema
    {
        return PuTravelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuTravelTable::configure($table);
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
            'index' => ListPuTravel::route('/'),
            'create' => CreatePuTravel::route('/create'),
            'edit' => EditPuTravel::route('/{record}/edit'),
        ];
    }
}
