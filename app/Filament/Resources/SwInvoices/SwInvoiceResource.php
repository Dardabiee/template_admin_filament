<?php

namespace App\Filament\Resources\SwInvoices;

use App\Filament\Resources\SwInvoices\Pages\CreateSwInvoice;
use App\Filament\Resources\SwInvoices\Pages\EditSwInvoice;
use App\Filament\Resources\SwInvoices\Pages\ListSwInvoices;
use App\Filament\Resources\SwInvoices\Pages\ViewSwInvoice;
use App\Filament\Resources\SwInvoices\Schemas\SwInvoiceForm;
use App\Filament\Resources\SwInvoices\Tables\SwInvoicesTable;
use App\Models\SwInvoice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwInvoiceResource extends Resource
{
    protected static ?string $model = SwInvoice::class;

    protected static ?string $navigationLabel = 'SW Invoice';
    protected static ?string $modelLabel = 'View Invoice';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SW Invoice';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwInvoice';

    public static function form(Schema $schema): Schema
    {
        return SwInvoiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwInvoicesTable::configure($table);
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
            'index' => ListSwInvoices::route('/'),
            'create' => CreateSwInvoice::route('/create'),
            'edit' => EditSwInvoice::route('/{record}/edit'),
            'view' => ViewSwInvoice::route('/{record}')
        ];
    }
}
