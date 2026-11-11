<?php

namespace App\Filament\Resources\PuAgens;

use App\Filament\Resources\PuAgens\Pages\CreatePuAgen;
use App\Filament\Resources\PuAgens\Pages\EditPuAgen;
use App\Filament\Resources\PuAgens\Pages\ListPuAgens;
use App\Filament\Resources\PuAgens\Schemas\PuAgenForm;
use App\Filament\Resources\PuAgens\Tables\PuAgensTable;
use App\Models\PuAgen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuAgenResource extends Resource
{
    protected static ?string $model = PuAgen::class;
    protected static ?string $navigationLabel = 'Data Agen';
    protected static ?string $modelLabel = ' Data Agen';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Data Agen';
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuAgen';

    public static function form(Schema $schema): Schema
    {
        return PuAgenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuAgensTable::configure($table);
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
            'index' => ListPuAgens::route('/'),
            'create' => CreatePuAgen::route('/create'),
            'edit' => EditPuAgen::route('/{record}/edit'),
        ];
    }
}
