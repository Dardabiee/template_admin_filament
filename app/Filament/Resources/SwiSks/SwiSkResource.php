<?php

namespace App\Filament\Resources\SwiSks;

use App\Filament\Resources\SwiSks\Pages\CreateSwiSk;
use App\Filament\Resources\SwiSks\Pages\EditSwiSk;
use App\Filament\Resources\SwiSks\Pages\ListSwiSks;
use App\Filament\Resources\SwiSks\Schemas\SwiSkForm;
use App\Filament\Resources\SwiSks\Tables\SwiSksTable;
use App\Models\SwiSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwiSkResource extends Resource
{
    protected static ?string $model = SwiSk::class;

     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'SK';
    protected static ?string $modelLabel = ' SK';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table SK  ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwiSk';

    public static function form(Schema $schema): Schema
    {
        return SwiSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwiSksTable::configure($table);
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
            'index' => ListSwiSks::route('/'),
            'create' => CreateSwiSk::route('/create'),
            'edit' => EditSwiSk::route('/{record}/edit'),
        ];
    }
}
