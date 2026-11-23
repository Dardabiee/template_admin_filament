<?php

namespace App\Filament\Resources\HmDeklarasis;

use App\Filament\Resources\HmDeklarasis\Pages\CreateHmDeklarasi;
use App\Filament\Resources\HmDeklarasis\Pages\EditHmDeklarasi;
use App\Filament\Resources\HmDeklarasis\Pages\ListHmDeklarasis;
use App\Filament\Resources\HmDeklarasis\Pages\ViewHmDeklarasi;
use App\Filament\Resources\HmDeklarasis\Schemas\HmDeklarasiForm;
use App\Filament\Resources\HmDeklarasis\Tables\HmDeklarasisTable;
use App\Models\HmDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HmDeklarasiResource extends Resource
{
    protected static ?string $model = HmDeklarasi::class;
     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'HM Deklarasi';
    protected static ?string $modelLabel = ' Deklarasi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Deklarasi HM';
    // Tambahkan baris ini 
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HmDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return HmDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HmDeklarasisTable::configure($table);
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
            'index' => ListHmDeklarasis::route('/'),
            'create' => CreateHmDeklarasi::route('/create'),
            'edit' => EditHmDeklarasi::route('/{record}/edit'),
            'view' => ViewHmDeklarasi::route('/{record}')
        ];
    }
}
