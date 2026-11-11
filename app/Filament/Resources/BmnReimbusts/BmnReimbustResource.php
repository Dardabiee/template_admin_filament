<?php

namespace App\Filament\Resources\BmnReimbusts;

use App\Filament\Resources\BmnReimbusts\Pages\CreateBmnReimbust;
use App\Filament\Resources\BmnReimbusts\Pages\EditBmnReimbust;
use App\Filament\Resources\BmnReimbusts\Pages\ListBmnReimbusts;
use App\Filament\Resources\BmnReimbusts\Pages\ViewBmnReimbust;
use App\Filament\Resources\BmnReimbusts\Schemas\BmnReimbustForm;
use App\Filament\Resources\BmnReimbusts\Tables\BmnReimbustsTable;
use App\Models\BmnReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BmnReimbustResource extends Resource
{
    protected static ?string $model = BmnReimbust::class;
    protected static ?string $navigationLabel = 'BMN Reimbust';
    protected static ?string $modelLabel = ' Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Reimbust BMN ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'BmnReimbust';

    public static function form(Schema $schema): Schema
    {
        return BmnReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BmnReimbustsTable::configure($table);
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
            'index' => ListBmnReimbusts::route('/'),
            'create' => CreateBmnReimbust::route('/create'),
            'edit' => EditBmnReimbust::route('/{record}/edit'),
            'view' => ViewBmnReimbust::route('/{record}')
        ];
    }
}
