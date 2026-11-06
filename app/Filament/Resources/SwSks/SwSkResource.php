<?php

namespace App\Filament\Resources\SwSks;

use App\Filament\Resources\SwSks\Pages\CreateSwSk;
use App\Filament\Resources\SwSks\Pages\EditSwSk;
use App\Filament\Resources\SwSks\Pages\ListSwSks;
use App\Filament\Resources\SwSks\Schemas\SwSkForm;
use App\Filament\Resources\SwSks\Tables\SwSksTable;
use App\Models\SwSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwSkResource extends Resource
{
    protected static ?string $model = SwSk::class;
    protected static ?string $navigationLabel = 'SW SK';
    protected static ?string $modelLabel = 'View SK';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SW SK';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwSk';

    public static function form(Schema $schema): Schema
    {
        return SwSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwSksTable::configure($table);
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
            'index' => ListSwSks::route('/'),
            'create' => CreateSwSk::route('/create'),
            'edit' => EditSwSk::route('/{record}/edit'),
        ];
    }
}
