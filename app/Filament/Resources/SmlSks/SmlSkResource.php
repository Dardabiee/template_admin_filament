<?php

namespace App\Filament\Resources\SmlSks;

use App\Filament\Resources\SmlSks\Pages\CreateSmlSk;
use App\Filament\Resources\SmlSks\Pages\EditSmlSk;
use App\Filament\Resources\SmlSks\Pages\ListSmlSks;
use App\Filament\Resources\SmlSks\Schemas\SmlSkForm;
use App\Filament\Resources\SmlSks\Tables\SmlSksTable;
use App\Models\SmlSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SmlSkResource extends Resource
{
    protected static ?string $model = SmlSk::class;
    protected static ?string $navigationLabel = 'SML SK';
    protected static ?string $modelLabel = ' SK';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SML SK';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SmlSk';

    public static function form(Schema $schema): Schema
    {
        return SmlSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SmlSksTable::configure($table);
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
            'index' => ListSmlSks::route('/'),
            'create' => CreateSmlSk::route('/create'),
            'edit' => EditSmlSk::route('/{record}/edit'),
        ];
    }
}
