<?php

namespace App\Filament\Resources\SwiDeklarasis;

use App\Filament\Resources\SwiDeklarasis\Pages\CreateSwiDeklarasi;
use App\Filament\Resources\SwiDeklarasis\Pages\EditSwiDeklarasi;
use App\Filament\Resources\SwiDeklarasis\Pages\ListSwiDeklarasis;
use App\Filament\Resources\SwiDeklarasis\Pages\ViewSwiDeklarasi;
use App\Filament\Resources\SwiDeklarasis\Schemas\SwiDeklarasiForm;
use App\Filament\Resources\SwiDeklarasis\Tables\SwiDeklarasisTable;
use App\Models\SwiDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwiDeklarasiResource extends Resource
{
    protected static ?string $model = SwiDeklarasi::class;

     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'Deklarasi';
    protected static ?string $modelLabel = 'View Deklarasi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Deklarasi SW ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwiDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return SwiDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwiDeklarasisTable::configure($table);
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
            'index' => ListSwiDeklarasis::route('/'),
            'create' => CreateSwiDeklarasi::route('/create'),
            'edit' => EditSwiDeklarasi::route('/{record}/edit'),
            'view' => ViewSwiDeklarasi::route('/{record}')
        ];
    }
}
