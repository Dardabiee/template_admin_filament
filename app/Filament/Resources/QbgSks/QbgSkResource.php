<?php

namespace App\Filament\Resources\QbgSks;

use App\Filament\Resources\QbgSks\Pages\CreateQbgSk;
use App\Filament\Resources\QbgSks\Pages\EditQbgSk;
use App\Filament\Resources\QbgSks\Pages\ListQbgSks;
use App\Filament\Resources\QbgSks\Schemas\QbgSkForm;
use App\Filament\Resources\QbgSks\Tables\QbgSksTable;
use App\Models\QbgSk;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QbgSkResource extends Resource
{
    protected static ?string $model = QbgSk::class;
    protected static ?string $navigationLabel = 'QBG SK';
    protected static ?string $modelLabel = 'View SK';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'QBG SK';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QbgSK';

    public static function form(Schema $schema): Schema
    {
        return QbgSkForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QbgSksTable::configure($table);
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
            'index' => ListQbgSks::route('/'),
            'create' => CreateQbgSk::route('/create'),
            'edit' => EditQbgSk::route('/{record}/edit'),
        ];
    }
}
