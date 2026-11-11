<?php

namespace App\Filament\Resources\QbgInvoices;

use App\Filament\Resources\QbgInvoices\Pages\CreateQbgInvoice;
use App\Filament\Resources\QbgInvoices\Pages\EditQbgInvoice;
use App\Filament\Resources\QbgInvoices\Pages\ListQbgInvoices;
use App\Filament\Resources\QbgInvoices\Pages\ViewQbgInvoice;
use App\Filament\Resources\QbgInvoices\Schemas\QbgInvoiceForm;
use App\Filament\Resources\QbgInvoices\Tables\QbgInvoicesTable;
use App\Models\QbgInvoice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QbgInvoiceResource extends Resource
{
    protected static ?string $model = QbgInvoice::class;

    protected static ?string $navigationLabel = 'QBG Invoice';
    protected static ?string $modelLabel = ' Invoice';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'QBG Invoice';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QbgInvoice';

    public static function form(Schema $schema): Schema
    {
        return QbgInvoiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QbgInvoicesTable::configure($table);
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
            'index' => ListQbgInvoices::route('/'),
            'create' => CreateQbgInvoice::route('/create'),
            'edit' => EditQbgInvoice::route('/{record}/edit'),
            'view' => ViewQbgInvoice::route('/{record}'),
        ];
    }
}
