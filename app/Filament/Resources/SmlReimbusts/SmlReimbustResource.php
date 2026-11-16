<?php

namespace App\Filament\Resources\SmlReimbusts;

use App\Filament\Resources\SmlReimbusts\Pages\CreateSmlReimbust;
use App\Filament\Resources\SmlReimbusts\Pages\EditSmlReimbust;
use App\Filament\Resources\SmlReimbusts\Pages\ListSmlReimbusts;
use App\Filament\Resources\SmlReimbusts\Pages\ViewSmlReimbust;
use App\Filament\Resources\SmlReimbusts\Schemas\SmlReimbustForm;
use App\Filament\Resources\SmlReimbusts\Tables\SmlReimbustsTable;
use App\Models\SmlReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SmlReimbustResource extends Resource
{
    protected static ?string $model = SmlReimbust::class;
     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'Reimbust';
    protected static ?string $modelLabel = ' Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Reimbust ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SmlReimbust';

    public static function form(Schema $schema): Schema
    {
        return SmlReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SmlReimbustsTable::configure($table);
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
            'index' => ListSmlReimbusts::route('/'),
            'create' => CreateSmlReimbust::route('/create'),
            'edit' => EditSmlReimbust::route('/{record}/edit'),
            'view' => ViewSmlReimbust::route('/{record}')
        ];
    }
}
