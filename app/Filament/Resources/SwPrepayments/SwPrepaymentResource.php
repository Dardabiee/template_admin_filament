<?php

namespace App\Filament\Resources\SwPrepayments;

use App\Filament\Resources\SwPrepayments\Pages\CreateSwPrepayment;
use App\Filament\Resources\SwPrepayments\Pages\EditSwPrepayment;
use App\Filament\Resources\SwPrepayments\Pages\ListSwPrepayments;
use App\Filament\Resources\SwPrepayments\Pages\ViewSwPrepayment;
use App\Filament\Resources\SwPrepayments\Schemas\SwPrepaymentForm;
use App\Filament\Resources\SwPrepayments\Tables\SwPrepaymentsTable;
use App\Models\SwPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwPrepaymentResource extends Resource
{
    protected static ?string $model = SwPrepayment::class;

     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'SW Prepayment';
    protected static ?string $modelLabel = ' Prepayment';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Prepayment SW ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwPrepayment';

    public static function form(Schema $schema): Schema
    {
        return SwPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwPrepaymentsTable::configure($table);
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
            'index' => ListSwPrepayments::route('/'),
            'create' => CreateSwPrepayment::route('/create'),
            'edit' => EditSwPrepayment::route('/{record}/edit'),
            'view' => ViewSwPrepayment::route('/{record}')
        ];
    }
}
