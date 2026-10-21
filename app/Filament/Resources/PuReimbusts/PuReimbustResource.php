<?php

namespace App\Filament\Resources\PuReimbusts;

use App\Filament\Resources\PuReimbusts\Pages\CreatePuReimbust;
use App\Filament\Resources\PuReimbusts\Pages\EditPuReimbust;
use App\Filament\Resources\PuReimbusts\Pages\ListPuReimbusts;
use App\Filament\Resources\PuReimbusts\Pages\ViewPuReimbust;
use App\Filament\Resources\PuReimbusts\Schemas\PuReimbustForm;
use App\Filament\Resources\PuReimbusts\Tables\PuReimbustsTable;
use App\Models\PuReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuReimbustResource extends Resource
{
    protected static ?string $model = PuReimbust::class;

    // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'PU Reimbust';
    protected static ?string $modelLabel = 'PU Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'PU Reimbust';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuReimbust';

    public static function form(Schema $schema): Schema
    {
        return PuReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuReimbustsTable::configure($table);
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
            'index' => ListPuReimbusts::route('/'),
            // 'create' => CreatePuReimbust::route('/create'),
            // 'edit' => EditPuReimbust::route('/{record}/edit'),
            'view' => ViewPuReimbust::route('/{record}')
        ];
    }
}
