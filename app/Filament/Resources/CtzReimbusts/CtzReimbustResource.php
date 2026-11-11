<?php

namespace App\Filament\Resources\CtzReimbusts;

use App\Filament\Resources\CtzReimbusts\Pages\CreateCtzReimbust;
use App\Filament\Resources\CtzReimbusts\Pages\EditCtzReimbust;
use App\Filament\Resources\CtzReimbusts\Pages\ListCtzReimbusts;
use App\Filament\Resources\CtzReimbusts\Pages\ViewCtzReimbust;
use App\Filament\Resources\CtzReimbusts\Schemas\CtzReimbustForm;
use App\Filament\Resources\CtzReimbusts\Tables\CtzReimbustsTable;
use App\Models\CtzReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CtzReimbustResource extends Resource
{
    protected static ?string $model = CtzReimbust::class;
    protected static ?string $navigationLabel = 'Reimbust';
    protected static ?string $modelLabel = 'View Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Reimbust ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CtzReimbust';

    public static function form(Schema $schema): Schema
    {
        return CtzReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CtzReimbustsTable::configure($table);
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
            'index' => ListCtzReimbusts::route('/'),
            'create' => CreateCtzReimbust::route('/create'),
            'edit' => EditCtzReimbust::route('/{record}/edit'),
            'view' => ViewCtzReimbust::route('/{record}')
        ];
    }
}
