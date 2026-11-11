<?php

namespace App\Filament\Resources\CtzDeklarasis;

use App\Filament\Resources\CtzDeklarasis\Pages\CreateCtzDeklarasi;
use App\Filament\Resources\CtzDeklarasis\Pages\EditCtzDeklarasi;
use App\Filament\Resources\CtzDeklarasis\Pages\ListCtzDeklarasis;
use App\Filament\Resources\CtzDeklarasis\Pages\ViewCtzDeklarasi;
use App\Filament\Resources\CtzDeklarasis\Schemas\CtzDeklarasiForm;
use App\Filament\Resources\CtzDeklarasis\Tables\CtzDeklarasisTable;
use App\Models\CtzDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CtzDeklarasiResource extends Resource
{
    protected static ?string $model = CtzDeklarasi::class;
    protected static ?string $navigationLabel = 'Deklarasi';
    protected static ?string $modelLabel = 'View Deklarasi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Deklarasi';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CtzDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return CtzDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CtzDeklarasisTable::configure($table);
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
            'index' => ListCtzDeklarasis::route('/'),
            'create' => CreateCtzDeklarasi::route('/create'),
            'edit' => EditCtzDeklarasi::route('/{record}/edit'),
            'view' => ViewCtzDeklarasi::route('/{record}')
        ];
    }
}
