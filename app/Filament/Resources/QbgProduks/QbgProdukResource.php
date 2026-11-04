<?php

namespace App\Filament\Resources\QbgProduks;

use App\Filament\Resources\QbgProduks\Pages\CreateQbgProduk;
use App\Filament\Resources\QbgProduks\Pages\EditQbgProduk;
use App\Filament\Resources\QbgProduks\Pages\ListQbgProduks;
use App\Filament\Resources\QbgProduks\Schemas\QbgProdukForm;
use App\Filament\Resources\QbgProduks\Tables\QbgProduksTable;
use App\Models\QbgProduk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QbgProdukResource extends Resource
{
    protected static ?string $model = QbgProduk::class;

    protected static ?string $navigationLabel = 'QBG Produk';
    protected static ?string $modelLabel = 'View Produk';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'QBG Produk';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QbgProduk';

    public static function form(Schema $schema): Schema
    {
        return QbgProdukForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QbgProduksTable::configure($table);
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
            'index' => ListQbgProduks::route('/'),
            'create' => CreateQbgProduk::route('/create'),
            'edit' => EditQbgProduk::route('/{record}/edit'),
        ];
    }
}
