<?php

namespace App\Filament\Resources\QbgDeklarasis;

use App\Filament\Resources\QbgDeklarasis\Pages\CreateQbgDeklarasi;
use App\Filament\Resources\QbgDeklarasis\Pages\EditQbgDeklarasi;
use App\Filament\Resources\QbgDeklarasis\Pages\ListQbgDeklarasis;
use App\Filament\Resources\QbgDeklarasis\Pages\ViewQbgDeklarasi;
use App\Filament\Resources\QbgDeklarasis\Schemas\QbgDeklarasiForm;
use App\Filament\Resources\QbgDeklarasis\Tables\QbgDeklarasisTable;
use App\Models\QbgDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QbgDeklarasiResource extends Resource
{
    protected static ?string $model = QbgDeklarasi::class;
     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'QBG Deklarasi';
    protected static ?string $modelLabel = 'View Deklarasi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'QBG Deklarasi';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QbgDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return QbgDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QbgDeklarasisTable::configure($table);
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
            'index' => ListQbgDeklarasis::route('/'),
            'create' => CreateQbgDeklarasi::route('/create'),
            'edit' => EditQbgDeklarasi::route('/{record}/edit'),
            'view' => ViewQbgDeklarasi::route('/{record}'),
        ];
    }
}
