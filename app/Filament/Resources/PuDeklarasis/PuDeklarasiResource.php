<?php

namespace App\Filament\Resources\PuDeklarasis;

use App\Filament\Resources\PuDeklarasis\Pages\CreatePuDeklarasi;
use App\Filament\Resources\PuDeklarasis\Pages\EditPuDeklarasi;
use App\Filament\Resources\PuDeklarasis\Pages\ListPuDeklarasis;
use App\Filament\Resources\PuDeklarasis\Pages\ViewPuDeklarasi;
use App\Filament\Resources\PuDeklarasis\Schemas\PuDeklarasiForm;
use App\Filament\Resources\PuDeklarasis\Tables\PuDeklarasisTable;
use App\Models\PuDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuDeklarasiResource extends Resource
{
    protected static ?string $model = PuDeklarasi::class;

    // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'Table Deklarasi';
    protected static ?string $modelLabel = 'Deklarasi PU';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Deklarasi PU';

    protected static bool $shouldRegisterNavigation = false;
    

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return PuDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuDeklarasisTable::configure($table);
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
            'index' => ListPuDeklarasis::route('/'),
            'create' => CreatePuDeklarasi::route('/create'),
            'edit' => EditPuDeklarasi::route('/{record}/edit'),
            'view' => ViewPuDeklarasi::route('/{record}')
        ];
    }
}
