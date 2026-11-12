<?php

namespace App\Filament\Resources\MacReimbusts;

use App\Filament\Resources\MacReimbusts\Pages\CreateMacReimbust;
use App\Filament\Resources\MacReimbusts\Pages\EditMacReimbust;
use App\Filament\Resources\MacReimbusts\Pages\ListMacReimbusts;
use App\Filament\Resources\MacReimbusts\Pages\ViewMacReimbust;
use App\Filament\Resources\MacReimbusts\Schemas\MacReimbustForm;
use App\Filament\Resources\MacReimbusts\Tables\MacReimbustsTable;
use App\Models\MacReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MacReimbustResource extends Resource
{
    protected static ?string $model = MacReimbust::class;

     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'MAC Reimbust';
    protected static ?string $modelLabel = ' Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Reimbust MAC ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'MacReimbust';

    public static function form(Schema $schema): Schema
    {
        return MacReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MacReimbustsTable::configure($table);
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
            'index' => ListMacReimbusts::route('/'),
            'create' => CreateMacReimbust::route('/create'),
            'edit' => EditMacReimbust::route('/{record}/edit'),
            'view' => ViewMacReimbust::route('/{record}')
        ];
    }
}
