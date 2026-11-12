<?php

namespace App\Filament\Resources\MacDeklarasis;

use App\Filament\Resources\MacDeklarasis\Pages\CreateMacDeklarasi;
use App\Filament\Resources\MacDeklarasis\Pages\EditMacDeklarasi;
use App\Filament\Resources\MacDeklarasis\Pages\ListMacDeklarasis;
use App\Filament\Resources\MacDeklarasis\Pages\ViewMacDeklarasi;
use App\Filament\Resources\MacDeklarasis\Schemas\MacDeklarasiForm;
use App\Filament\Resources\MacDeklarasis\Tables\MacDeklarasisTable;
use App\Models\MacDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MacDeklarasiResource extends Resource
{
    protected static ?string $model = MacDeklarasi::class;
    // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'MAC Deklarasi';
    protected static ?string $modelLabel = 'Deklarasi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Deklarasi MAC ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'MacDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return MacDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MacDeklarasisTable::configure($table);
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
            'index' => ListMacDeklarasis::route('/'),
            'create' => CreateMacDeklarasi::route('/create'),
            'edit' => EditMacDeklarasi::route('/{record}/edit'),
            'view' => ViewMacDeklarasi::route('/{record}')
        ];
    }
}
