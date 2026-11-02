<?php

namespace App\Filament\Resources\PuLayanans;

use App\Filament\Resources\PuLayanans\Pages\CreatePuLayanan;
use App\Filament\Resources\PuLayanans\Pages\EditPuLayanan;
use App\Filament\Resources\PuLayanans\Pages\ListPuLayanans;
use App\Filament\Resources\PuLayanans\Schemas\PuLayananForm;
use App\Filament\Resources\PuLayanans\Tables\PuLayanansTable;
use App\Models\PuLayanan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuLayananResource extends Resource
{
    protected static ?string $model = PuLayanan::class;
    protected static ?string $navigationLabel = 'Layanan PU';
    protected static ?string $modelLabel = 'Layanan PU';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Layanan PU';
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuLayanan';

    public static function form(Schema $schema): Schema
    {
        return PuLayananForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuLayanansTable::configure($table);
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
            'index' => ListPuLayanans::route('/'),
            'create' => CreatePuLayanan::route('/create'),
            'edit' => EditPuLayanan::route('/{record}/edit'),
        ];
    }
}
