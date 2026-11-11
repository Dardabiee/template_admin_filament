<?php

namespace App\Filament\Resources\BmnDeklarasis;

use App\Filament\Resources\BmnDeklarasis\Pages\CreateBmnDeklarasi;
use App\Filament\Resources\BmnDeklarasis\Pages\EditBmnDeklarasi;
use App\Filament\Resources\BmnDeklarasis\Pages\ListBmnDeklarasis;
use App\Filament\Resources\BmnDeklarasis\Pages\ViewBmnDeklarasi;
use App\Filament\Resources\BmnDeklarasis\Schemas\BmnDeklarasiForm;
use App\Filament\Resources\BmnDeklarasis\Tables\BmnDeklarasisTable;
use App\Models\BmnDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BmnDeklarasiResource extends Resource
{
    protected static ?string $model = BmnDeklarasi::class;
    protected static ?string $navigationLabel = 'BMN Deklarasi';
    protected static ?string $modelLabel = ' Deklarasi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Deklarasi BMN ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'BmnDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return BmnDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BmnDeklarasisTable::configure($table);
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
            'index' => ListBmnDeklarasis::route('/'),
            'create' => CreateBmnDeklarasi::route('/create'),
            'edit' => EditBmnDeklarasi::route('/{record}/edit'),
            'view' => ViewBmnDeklarasi::route('/{record}')
        ];
    }
}
