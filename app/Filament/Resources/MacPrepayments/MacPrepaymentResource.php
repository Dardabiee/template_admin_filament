<?php

namespace App\Filament\Resources\MacPrepayments;

use App\Filament\Resources\MacPrepayments\Pages\CreateMacPrepayment;
use App\Filament\Resources\MacPrepayments\Pages\EditMacPrepayment;
use App\Filament\Resources\MacPrepayments\Pages\ListMacPrepayments;
use App\Filament\Resources\MacPrepayments\Pages\ViewMacPrepayment;
use App\Filament\Resources\MacPrepayments\Schemas\MacPrepaymentForm;
use App\Filament\Resources\MacPrepayments\Tables\MacPrepaymentsTable;
use App\Models\MacPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MacPrepaymentResource extends Resource
{
    protected static ?string $model = MacPrepayment::class;
     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'MAC Prepayment';
    protected static ?string $modelLabel = 'Prepayment';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Prepayment MAC ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'MacPrepayment';

    public static function form(Schema $schema): Schema
    {
        return MacPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MacPrepaymentsTable::configure($table);
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
            'index' => ListMacPrepayments::route('/'),
            'create' => CreateMacPrepayment::route('/create'),
            'edit' => EditMacPrepayment::route('/{record}/edit'),
            'view' => ViewMacPrepayment::route('/{record}')
        ];
    }
}
