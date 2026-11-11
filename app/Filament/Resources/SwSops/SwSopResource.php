<?php

namespace App\Filament\Resources\SwSops;

use App\Filament\Resources\SwSops\Pages\CreateSwSop;
use App\Filament\Resources\SwSops\Pages\EditSwSop;
use App\Filament\Resources\SwSops\Pages\ListSwSops;
use App\Filament\Resources\SwSops\Schemas\SwSopForm;
use App\Filament\Resources\SwSops\Tables\SwSopsTable;
use App\Models\SwSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwSopResource extends Resource
{
    protected static ?string $model = SwSop::class;
    protected static ?string $navigationLabel = 'SW SOP';
    protected static ?string $modelLabel = ' SOP';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SW SOP';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwSop';

    public static function form(Schema $schema): Schema
    {
        return SwSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwSopsTable::configure($table);
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
            'index' => ListSwSops::route('/'),
            'create' => CreateSwSop::route('/create'),
            'edit' => EditSwSop::route('/{record}/edit'),
        ];
    }
}
