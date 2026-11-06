<?php

namespace App\Filament\Resources\SwReimbusts;

use App\Filament\Resources\SwReimbusts\Pages\CreateSwReimbust;
use App\Filament\Resources\SwReimbusts\Pages\EditSwReimbust;
use App\Filament\Resources\SwReimbusts\Pages\ListSwReimbusts;
use App\Filament\Resources\SwReimbusts\Pages\ViewSwReimbust;
use App\Filament\Resources\SwReimbusts\Schemas\SwReimbustForm;
use App\Filament\Resources\SwReimbusts\Tables\SwReimbustsTable;
use App\Models\SwReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwReimbustResource extends Resource
{
    protected static ?string $model = SwReimbust::class;
     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'SW Reimbust';
    protected static ?string $modelLabel = 'View Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Reimbust SW ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwReimbust';

    public static function form(Schema $schema): Schema
    {
        return SwReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwReimbustsTable::configure($table);
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
            'index' => ListSwReimbusts::route('/'),
            'create' => CreateSwReimbust::route('/create'),
            'edit' => EditSwReimbust::route('/{record}/edit'),
            'view' => ViewSwReimbust::route('/{record')
        ];
    }
}
