<?php

namespace App\Filament\Resources\PuPrepayments;

use App\Filament\Resources\PuPrepayments\Pages\CreatePuPrepayment;
use App\Filament\Resources\PuPrepayments\Pages\EditPuPrepayment;
use App\Filament\Resources\PuPrepayments\Pages\ListPuPrepayments;
use App\Filament\Resources\PuPrepayments\Pages\ViewPuPrepayment;
use App\Filament\Resources\PuPrepayments\Schemas\PuPrepaymentForm;
use App\Filament\Resources\PuPrepayments\Tables\PuPrepaymentsTable;
use App\Models\PuPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuPrepaymentResource extends Resource
{
    protected static ?string $model = PuPrepayment::class;

    // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'PU Prepayment';
    protected static ?string $modelLabel = 'PU Prepayment';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'PU Prepayment';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuPrepayment';

    public static function form(Schema $schema): Schema
    {
        return PuPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuPrepaymentsTable::configure($table);
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
            'index' => ListPuPrepayments::route('/'),
            'create' => CreatePuPrepayment::route('/create'),
            'edit' => EditPuPrepayment::route('/{record}/edit'),
            'view' => ViewPuPrepayment::route('/{record}')
        ];
    }
}
