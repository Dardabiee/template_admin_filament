<?php

namespace App\Filament\Resources\KpsReimbusts;

use App\Filament\Resources\KpsReimbusts\Pages\CreateKpsReimbust;
use App\Filament\Resources\KpsReimbusts\Pages\EditKpsReimbust;
use App\Filament\Resources\KpsReimbusts\Pages\ListKpsReimbusts;
use App\Filament\Resources\KpsReimbusts\Pages\ViewKpsReimbust;
use App\Filament\Resources\KpsReimbusts\Schemas\KpsReimbustForm;
use App\Filament\Resources\KpsReimbusts\Tables\KpsReimbustsTable;
use App\Models\KpsReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KpsReimbustResource extends Resource
{
    protected static ?string $model = KpsReimbust::class;

    // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'KPS Reimbust';
    protected static ?string $modelLabel = 'Reimbust KPS ';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Reimbust KPS ';


    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'KpsReimbust';

    public static function form(Schema $schema): Schema
    {
        return KpsReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KpsReimbustsTable::configure($table);
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
            'index' => ListKpsReimbusts::route('/'),
            'create' => CreateKpsReimbust::route('/create'),
            'edit' => EditKpsReimbust::route('/{record}/edit'),
            'view' => ViewKpsReimbust::route('/{record}')
        ];
    }
}
