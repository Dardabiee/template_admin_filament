<?php

namespace App\Filament\Resources\PuHotels;

use App\Filament\Resources\PuHotels\Pages\CreatePuHotel;
use App\Filament\Resources\PuHotels\Pages\EditPuHotel;
use App\Filament\Resources\PuHotels\Pages\ListPuHotels;
use App\Filament\Resources\PuHotels\Schemas\PuHotelForm;
use App\Filament\Resources\PuHotels\Tables\PuHotelsTable;
use App\Models\PuHotel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuHotelResource extends Resource
{
    protected static ?string $model = PuHotel::class;

    protected static ?string $navigationLabel = 'Hotel';
    protected static ?string $modelLabel = 'Hotel';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Hotel';
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuHotel';

    public static function form(Schema $schema): Schema
    {
        return PuHotelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuHotelsTable::configure($table);
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
            'index' => ListPuHotels::route('/'),
            'create' => CreatePuHotel::route('/create'),
            'edit' => EditPuHotel::route('/{record}/edit'),
        ];
    }
}
