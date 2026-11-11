<?php

namespace App\Filament\Resources\PuSops;

use App\Filament\Resources\PuSops\Pages\CreatePuSop;
use App\Filament\Resources\PuSops\Pages\EditPuSop;
use App\Filament\Resources\PuSops\Pages\ListPuSops;
use App\Filament\Resources\PuSops\Schemas\PuSopForm;
use App\Filament\Resources\PuSops\Tables\PuSopsTable;
use App\Models\PuSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuSopResource extends Resource
{
    protected static ?string $model = PuSop::class;

    protected static ?string $navigationLabel = 'SOP';
    protected static ?string $modelLabel = ' SOP';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SOP';
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuSop';

    public static function form(Schema $schema): Schema
    {
        return PuSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuSopsTable::configure($table);
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
            'index' => ListPuSops::route('/'),
            'create' => CreatePuSop::route('/create'),
            'edit' => EditPuSop::route('/{record}/edit'),
        ];
    }
}
