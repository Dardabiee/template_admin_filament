<?php

namespace App\Filament\Resources\MacSops;

use App\Filament\Resources\MacSops\Pages\CreateMacSop;
use App\Filament\Resources\MacSops\Pages\EditMacSop;
use App\Filament\Resources\MacSops\Pages\ListMacSops;
use App\Filament\Resources\MacSops\Schemas\MacSopForm;
use App\Filament\Resources\MacSops\Tables\MacSopsTable;
use App\Models\MacSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MacSopResource extends Resource
{
    protected static ?string $model = MacSop::class;
    // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'MAC SOP';
    protected static ?string $modelLabel = 'SOP';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table SOP MAC';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'MacSop';

    public static function form(Schema $schema): Schema
    {
        return MacSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MacSopsTable::configure($table);
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
            'index' => ListMacSops::route('/'),
            'create' => CreateMacSop::route('/create'),
            'edit' => EditMacSop::route('/{record}/edit'),
        ];
    }
}
