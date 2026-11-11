<?php

namespace App\Filament\Resources\BmnPrepayments;

use App\Filament\Resources\BmnPrepayments\Pages\CreateBmnPrepayment;
use App\Filament\Resources\BmnPrepayments\Pages\EditBmnPrepayment;
use App\Filament\Resources\BmnPrepayments\Pages\ListBmnPrepayments;
use App\Filament\Resources\BmnPrepayments\Pages\ViewBmnPrepayment;
use App\Filament\Resources\BmnPrepayments\Schemas\BmnPrepaymentForm;
use App\Filament\Resources\BmnPrepayments\Tables\BmnPrepaymentsTable;
use App\Models\BmnPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BmnPrepaymentResource extends Resource
{
    protected static ?string $model = BmnPrepayment::class;

     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'BMN Prepayment';
    protected static ?string $modelLabel = 'View Prepayment';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Prepayment BMN ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'BmnPrepayment';

    public static function form(Schema $schema): Schema
    {
        return BmnPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BmnPrepaymentsTable::configure($table);
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
            'index' => ListBmnPrepayments::route('/'),
            'create' => CreateBmnPrepayment::route('/create'),
            'edit' => EditBmnPrepayment::route('/{record}/edit'),
            'view' => ViewBmnPrepayment::route('/{record}')
        ];
    }
}
