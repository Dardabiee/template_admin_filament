<?php

namespace App\Filament\Resources\PuNotifikasis;

use App\Filament\Resources\PuNotifikasis\Pages\CreatePuNotifikasi;
use App\Filament\Resources\PuNotifikasis\Pages\EditPuNotifikasi;
use App\Filament\Resources\PuNotifikasis\Pages\ListPuNotifikasis;
use App\Filament\Resources\PuNotifikasis\Pages\ViewNotifikasiPu;
use App\Filament\Resources\PuNotifikasis\Schemas\PuNotifikasiForm;
use App\Filament\Resources\PuNotifikasis\Tables\PuNotifikasisTable;
use App\Models\PuNotifikasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuNotifikasiResource extends Resource
{
    protected static ?string $model = PuNotifikasi::class;
    protected static ?string $navigationLabel = 'Notifikasi';
    protected static ?string $modelLabel = 'View Notifikasi';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Notifikasi';
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuNotifikasi';

    public static function form(Schema $schema): Schema
    {
        return PuNotifikasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuNotifikasisTable::configure($table);
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
            'index' => ListPuNotifikasis::route('/'),
            'create' => CreatePuNotifikasi::route('/create'),
            'edit' => EditPuNotifikasi::route('/{record}/edit'),
            'view' => ViewNotifikasiPu::route('/{record}'),
        ];
    }
}
