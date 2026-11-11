<?php

namespace App\Filament\Resources\SwiReimbusts;

use App\Filament\Resources\SwiReimbusts\Pages\CreateSwiReimbust;
use App\Filament\Resources\SwiReimbusts\Pages\EditSwiReimbust;
use App\Filament\Resources\SwiReimbusts\Pages\ListSwiReimbusts;
use App\Filament\Resources\SwiReimbusts\Pages\ViewSwiReimbust;
use App\Filament\Resources\SwiReimbusts\Schemas\SwiReimbustForm;
use App\Filament\Resources\SwiReimbusts\Tables\SwiReimbustsTable;
use App\Models\SwiReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwiReimbustResource extends Resource
{
    protected static ?string $model = SwiReimbust::class;
     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'Reimbust';
    protected static ?string $modelLabel = 'View Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Reimbust SW ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwiReimbust';

    public static function form(Schema $schema): Schema
    {
        return SwiReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwiReimbustsTable::configure($table);
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
            'index' => ListSwiReimbusts::route('/'),
            'create' => CreateSwiReimbust::route('/create'),
            'edit' => EditSwiReimbust::route('/{record}/edit'),
            'view' => ViewSwiReimbust::route('/{record}')
        ];
    }
}
