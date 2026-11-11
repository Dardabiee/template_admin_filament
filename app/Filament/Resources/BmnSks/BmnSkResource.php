<?php

namespace App\Filament\Resources\BmnSks;

use App\Filament\Resources\BmnSks\Pages\CreateBmnSk;
use App\Filament\Resources\BmnSks\Pages\EditBmnSk;
use App\Filament\Resources\BmnSks\Pages\ListBmnSks;
use App\Filament\Resources\BmnSks\Schemas\BmnSkForm;
use App\Filament\Resources\BmnSks\Tables\BmnSksTable;
use App\Models\BmnSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BmnSkResource extends Resource
{
    protected static ?string $model = BmnSk::class;
    protected static ?string $navigationLabel = 'BMN SK';
    protected static ?string $modelLabel = 'View SK';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table SK BMN ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'BmnSk';

    public static function form(Schema $schema): Schema
    {
        return BmnSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BmnSksTable::configure($table);
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
            'index' => ListBmnSks::route('/'),
            'create' => CreateBmnSk::route('/create'),
            'edit' => EditBmnSk::route('/{record}/edit'),
        ];
    }
}
