<?php

namespace App\Filament\Resources\BmnSops;

use App\Filament\Resources\BmnSops\Pages\CreateBmnSop;
use App\Filament\Resources\BmnSops\Pages\EditBmnSop;
use App\Filament\Resources\BmnSops\Pages\ListBmnSops;
use App\Filament\Resources\BmnSops\Schemas\BmnSopForm;
use App\Filament\Resources\BmnSops\Tables\BmnSopsTable;
use App\Models\BmnSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BmnSopResource extends Resource
{
    protected static ?string $model = BmnSop::class;
    protected static ?string $navigationLabel = 'BMN SOP';
    protected static ?string $modelLabel = 'View SOP';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table SOP BMN ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'BmnSop';

    public static function form(Schema $schema): Schema
    {
        return BmnSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BmnSopsTable::configure($table);
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
            'index' => ListBmnSops::route('/'),
            'create' => CreateBmnSop::route('/create'),
            'edit' => EditBmnSop::route('/{record}/edit'),
        ];
    }
}
