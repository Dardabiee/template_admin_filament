<?php

namespace App\Filament\Resources\SmlSops;

use App\Filament\Resources\SmlSops\Pages\CreateSmlSop;
use App\Filament\Resources\SmlSops\Pages\EditSmlSop;
use App\Filament\Resources\SmlSops\Pages\ListSmlSops;
use App\Filament\Resources\SmlSops\Schemas\SmlSopForm;
use App\Filament\Resources\SmlSops\Tables\SmlSopsTable;
use App\Models\SmlSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SmlSopResource extends Resource
{
    protected static ?string $model = SmlSop::class;
    protected static ?string $navigationLabel = 'SML SOP';
    protected static ?string $modelLabel = ' SOP';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SML SOP';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SmlSop';

    public static function form(Schema $schema): Schema
    {
        return SmlSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SmlSopsTable::configure($table);
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
            'index' => ListSmlSops::route('/'),
            'create' => CreateSmlSop::route('/create'),
            'edit' => EditSmlSop::route('/{record}/edit'),
        ];
    }
}
