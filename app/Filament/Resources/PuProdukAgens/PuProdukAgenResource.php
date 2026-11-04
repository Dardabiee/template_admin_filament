<?php

namespace App\Filament\Resources\PuProdukAgens;

use App\Filament\Resources\PuProdukAgens\Pages\CreatePuProdukAgen;
use App\Filament\Resources\PuProdukAgens\Pages\EditPuProdukAgen;
use App\Filament\Resources\PuProdukAgens\Pages\ListPuProdukAgens;
use App\Filament\Resources\PuProdukAgens\Schemas\PuProdukAgenForm;
use App\Filament\Resources\PuProdukAgens\Tables\PuProdukAgensTable;
use App\Models\PuProdukAgen;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuProdukAgenResource extends Resource
{
    protected static ?string $model = PuProdukAgen::class;

    protected static ?string $navigationLabel = 'Produk Agen';
    protected static ?string $modelLabel = 'View Produk Agen';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Produk Agen';
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuProdukAgen';

    public static function form(Schema $schema): Schema
    {
        return PuProdukAgenForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuProdukAgensTable::configure($table);
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
            'index' => ListPuProdukAgens::route('/'),
            'create' => CreatePuProdukAgen::route('/create'),
            'edit' => EditPuProdukAgen::route('/{record}/edit'),
        ];
    }
}
