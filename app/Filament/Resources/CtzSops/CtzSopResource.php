<?php

namespace App\Filament\Resources\CtzSops;

use App\Filament\Resources\CtzSops\Pages\CreateCtzSop;
use App\Filament\Resources\CtzSops\Pages\EditCtzSop;
use App\Filament\Resources\CtzSops\Pages\ListCtzSops;
use App\Filament\Resources\CtzSops\Schemas\CtzSopForm;
use App\Filament\Resources\CtzSops\Tables\CtzSopsTable;
use App\Models\CtzSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CtzSopResource extends Resource
{
    protected static ?string $model = CtzSop::class;
    protected static ?string $navigationLabel = 'SOP';
    protected static ?string $modelLabel = ' SOP';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table SOP';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CtzSop';

    public static function form(Schema $schema): Schema
    {
        return CtzSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CtzSopsTable::configure($table);
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
            'index' => ListCtzSops::route('/'),
            'create' => CreateCtzSop::route('/create'),
            'edit' => EditCtzSop::route('/{record}/edit'),
        ];
    }
}
