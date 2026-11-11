<?php

namespace App\Filament\Resources\QbgTransaksis;

use App\Filament\Resources\QbgTransaksis\Pages\CreateQbgTransaksi;
use App\Filament\Resources\QbgTransaksis\Pages\EditQbgTransaksi;
use App\Filament\Resources\QbgTransaksis\Pages\ListQbgTransaksis;
use App\Filament\Resources\QbgTransaksis\Schemas\QbgTransaksiForm;
use App\Filament\Resources\QbgTransaksis\Tables\QbgTransaksisTable;
use App\Models\QbgTransaksi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QbgTransaksiResource extends Resource
{
    protected static ?string $model = QbgTransaksi::class;
    protected static ?string $navigationLabel = 'QBG Transaksi';
    protected static ?string $modelLabel = ' Transaksi';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'QBG Transaksi';
    protected static bool $shouldRegisterNavigation = false;
    // Tambahkan baris ini untuk mematikan auto-discover sidebar d
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QbgTransaksi';

    public static function form(Schema $schema): Schema
    {
        return QbgTransaksiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QbgTransaksisTable::configure($table);
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
            'index' => ListQbgTransaksis::route('/'),
            'create' => CreateQbgTransaksi::route('/create'),
            'edit' => EditQbgTransaksi::route('/{record}/edit'),
        ];
    }
}
