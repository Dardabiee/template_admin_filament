<?php

namespace App\Filament\Resources\MacSks;

use App\Filament\Resources\MacSks\Pages\CreateMacSk;
use App\Filament\Resources\MacSks\Pages\EditMacSk;
use App\Filament\Resources\MacSks\Pages\ListMacSks;
use App\Filament\Resources\MacSks\Schemas\MacSkForm;
use App\Filament\Resources\MacSks\Tables\MacSksTable;
use App\Models\MacSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MacSkResource extends Resource
{
    protected static ?string $model = MacSk::class;
    // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'MAC SK';
    protected static ?string $modelLabel = ' SK';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table SK MAC';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'MacSk';

    public static function form(Schema $schema): Schema
    {
        return MacSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MacSksTable::configure($table);
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
            'index' => ListMacSks::route('/'),
            'create' => CreateMacSk::route('/create'),
            'edit' => EditMacSk::route('/{record}/edit'),
        ];
    }
}
