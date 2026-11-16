<?php

namespace App\Filament\Resources\SmlDeklarasis;

use App\Filament\Resources\SmlDeklarasis\Pages\CreateSmlDeklarasi;
use App\Filament\Resources\SmlDeklarasis\Pages\EditSmlDeklarasi;
use App\Filament\Resources\SmlDeklarasis\Pages\ListSmlDeklarasis;
use App\Filament\Resources\SmlDeklarasis\Pages\ViewSmlDeklarasi;
use App\Filament\Resources\SmlDeklarasis\Schemas\SmlDeklarasiForm;
use App\Filament\Resources\SmlDeklarasis\Tables\SmlDeklarasisTable;
use App\Models\SmlDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SmlDeklarasiResource extends Resource
{
    protected static ?string $model = SmlDeklarasi::class;
    protected static ?string $navigationLabel = 'Deklarasi';
    protected static ?string $modelLabel = ' Deklarasi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Deklarasi ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SmlDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return SmlDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SmlDeklarasisTable::configure($table);
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
            'index' => ListSmlDeklarasis::route('/'),
            'create' => CreateSmlDeklarasi::route('/create'),
            'edit' => EditSmlDeklarasi::route('/{record}/edit'),
            'view' => ViewSmlDeklarasi::route('/{record}')
        ];
    }
}
