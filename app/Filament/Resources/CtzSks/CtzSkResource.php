<?php

namespace App\Filament\Resources\CtzSks;

use App\Filament\Resources\CtzSks\Pages\CreateCtzSk;
use App\Filament\Resources\CtzSks\Pages\EditCtzSk;
use App\Filament\Resources\CtzSks\Pages\ListCtzSks;
use App\Filament\Resources\CtzSks\Schemas\CtzSkForm;
use App\Filament\Resources\CtzSks\Tables\CtzSksTable;
use App\Models\CtzSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CtzSkResource extends Resource
{
    protected static ?string $model = CtzSk::class;
    protected static ?string $navigationLabel = 'SK';
    protected static ?string $modelLabel = ' SK';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table SK';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CtzSk';

    public static function form(Schema $schema): Schema
    {
        return CtzSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CtzSksTable::configure($table);
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
            'index' => ListCtzSks::route('/'),
            'create' => CreateCtzSk::route('/create'),
            'edit' => EditCtzSk::route('/{record}/edit'),
        ];
    }
}
