<?php

namespace App\Filament\Resources\PuInvoices;

use App\Filament\Resources\PuInvoices\Pages\CreatePuInvoice;
use App\Filament\Resources\PuInvoices\Pages\EditPuInvoice;
use App\Filament\Resources\PuInvoices\Pages\ListPuInvoices;
use App\Filament\Resources\PuInvoices\Schemas\PuInvoiceForm;
use App\Filament\Resources\PuInvoices\Tables\PuInvoicesTable;
use App\Models\PuInvoice;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuInvoiceResource extends Resource
{
    protected static ?string $model = PuInvoice::class;
    protected static ?string $navigationLabel = 'Invoice PU';
    protected static ?string $modelLabel = 'View Invoice';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Invoice PU';
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuInvoice';

    public static function form(Schema $schema): Schema
    {
        return PuInvoiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuInvoicesTable::configure($table);
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
            'index' => ListPuInvoices::route('/'),
            'create' => CreatePuInvoice::route('/create'),
            'edit' => EditPuInvoice::route('/{record}/edit'),
        ];
    }
}
