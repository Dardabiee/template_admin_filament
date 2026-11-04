<?php

namespace App\Filament\Resources\PuSks;

use App\Filament\Resources\PuSks\Pages\CreatePuSk;
use App\Filament\Resources\PuSks\Pages\EditPuSk;
use App\Filament\Resources\PuSks\Pages\ListPuSks;
use App\Filament\Resources\PuSks\Schemas\PuSkForm;
use App\Filament\Resources\PuSks\Tables\PuSksTable;
use App\Models\PuSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuSkResource extends Resource
{
    protected static ?string $model = PuSk::class;
    protected static ?string $navigationLabel = 'SK';
    protected static ?string $modelLabel = 'SK';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SK';
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuSk';

    public static function form(Schema $schema): Schema
    {
        return PuSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuSksTable::configure($table);
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
            'index' => ListPuSks::route('/'),
            'create' => CreatePuSk::route('/create'),
            'edit' => EditPuSk::route('/{record}/edit'),
        ];
    }
}
