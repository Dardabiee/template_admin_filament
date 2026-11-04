<?php

namespace App\Filament\Resources\QbgSops;

use App\Filament\Resources\QbgSops\Pages\CreateQbgSop;
use App\Filament\Resources\QbgSops\Pages\EditQbgSop;
use App\Filament\Resources\QbgSops\Pages\ListQbgSops;
use App\Filament\Resources\QbgSops\Schemas\QbgSopForm;
use App\Filament\Resources\QbgSops\Tables\QbgSopsTable;
use App\Models\QbgSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QbgSopResource extends Resource
{
    protected static ?string $model = QbgSop::class;
    protected static ?string $navigationLabel = 'QBG SOP';
    protected static ?string $modelLabel = 'View SOP';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'QBG SOP';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QbgSop';

    public static function form(Schema $schema): Schema
    {
        return QbgSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QbgSopsTable::configure($table);
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
            'index' => ListQbgSops::route('/'),
            'create' => CreateQbgSop::route('/create'),
            'edit' => EditQbgSop::route('/{record}/edit'),
        ];
    }
}
