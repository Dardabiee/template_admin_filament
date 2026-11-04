<?php

namespace App\Filament\Resources\KpsSops;

use App\Filament\Resources\KpsSops\Pages\CreateKpsSop;
use App\Filament\Resources\KpsSops\Pages\EditKpsSop;
use App\Filament\Resources\KpsSops\Pages\ListKpsSops;
use App\Filament\Resources\KpsSops\Schemas\KpsSopForm;
use App\Filament\Resources\KpsSops\Tables\KpsSopsTable;
use App\Models\KpsSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KpsSopResource extends Resource
{
    protected static ?string $model = KpsSop::class;
    protected static ?string $navigationLabel = 'KPS SOP';
    protected static ?string $modelLabel = 'View SOP';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'KPS SOP';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'KpsSop';

    public static function form(Schema $schema): Schema
    {
        return KpsSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KpsSopsTable::configure($table);
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
            'index' => ListKpsSops::route('/'),
            'create' => CreateKpsSop::route('/create'),
            'edit' => EditKpsSop::route('/{record}/edit'),
        ];
    }
}
