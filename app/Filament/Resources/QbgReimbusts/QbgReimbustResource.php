<?php

namespace App\Filament\Resources\QbgReimbusts;

use App\Filament\Resources\QbgReimbusts\Pages\CreateQbgReimbust;
use App\Filament\Resources\QbgReimbusts\Pages\EditQbgReimbust;
use App\Filament\Resources\QbgReimbusts\Pages\ListQbgReimbusts;
use App\Filament\Resources\QbgReimbusts\Pages\ViewQbgReimbust;
use App\Filament\Resources\QbgReimbusts\Schemas\QbgReimbustForm;
use App\Filament\Resources\QbgReimbusts\Tables\QbgReimbustsTable;
use App\Models\QbgReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QbgReimbustResource extends Resource
{
    protected static ?string $model = QbgReimbust::class;
     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'QBG Reimbust';
    protected static ?string $modelLabel = 'View Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'QBG Reimbust';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QbgReimbust';

    public static function form(Schema $schema): Schema
    {
        return QbgReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QbgReimbustsTable::configure($table);
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
            'index' => ListQbgReimbusts::route('/'),
            'create' => CreateQbgReimbust::route('/create'),
            'edit' => EditQbgReimbust::route('/{record}/edit'),
            'view' => ViewQbgReimbust::route('/{record}'),
        ];
    }
}
