<?php

namespace App\Filament\Resources\SwDeklarasis;

use App\Filament\Resources\SwDeklarasis\Pages\CreateSwDeklarasi;
use App\Filament\Resources\SwDeklarasis\Pages\EditSwDeklarasi;
use App\Filament\Resources\SwDeklarasis\Pages\ListSwDeklarasis;
use App\Filament\Resources\SwDeklarasis\Pages\ViewSwDeklarasi;
use App\Filament\Resources\SwDeklarasis\Schemas\SwDeklarasiForm;
use App\Filament\Resources\SwDeklarasis\Tables\SwDeklarasisTable;
use App\Models\SwDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwDeklarasiResource extends Resource
{
    protected static ?string $model = SwDeklarasi::class;
    protected static ?string $navigationLabel = 'SW Deklarasi';
    protected static ?string $modelLabel = ' Deklarasi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SW Deklarasi';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return SwDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwDeklarasisTable::configure($table);
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
            'index' => ListSwDeklarasis::route('/'),
            'create' => CreateSwDeklarasi::route('/create'),
            'edit' => EditSwDeklarasi::route('/{record}/edit'),
            'view' => ViewSwDeklarasi::route('/{record}'),
        ];
    }
}
