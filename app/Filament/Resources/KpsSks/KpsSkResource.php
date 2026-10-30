<?php

namespace App\Filament\Resources\KpsSks;

use App\Filament\Resources\KpsSks\Pages\CreateKpsSk;
use App\Filament\Resources\KpsSks\Pages\EditKpsSk;
use App\Filament\Resources\KpsSks\Pages\ListKpsSks;
use App\Filament\Resources\KpsSks\Schemas\KpsSkForm;
use App\Filament\Resources\KpsSks\Tables\KpsSksTable;
use App\Models\KpsSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KpsSkResource extends Resource
{
    protected static ?string $model = KpsSk::class;

    protected static ?string $navigationLabel = 'SK';
    protected static ?string $modelLabel = 'SK';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SK';

    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'KpsSk';

    public static function form(Schema $schema): Schema
    {
        return KpsSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KpsSksTable::configure($table);
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
            'index' => ListKpsSks::route('/'),
            'create' => CreateKpsSk::route('/create'),
            'edit' => EditKpsSk::route('/{record}/edit'),
        ];
    }
}
