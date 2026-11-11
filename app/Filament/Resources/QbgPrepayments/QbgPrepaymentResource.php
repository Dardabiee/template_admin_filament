<?php

namespace App\Filament\Resources\QbgPrepayments;

use App\Filament\Resources\QbgPrepayments\Pages\CreateQbgPrepayment;
use App\Filament\Resources\QbgPrepayments\Pages\EditQbgPrepayment;
use App\Filament\Resources\QbgPrepayments\Pages\ListQbgPrepayments;
use App\Filament\Resources\QbgPrepayments\Pages\ViewQbgPrepayment;
use App\Filament\Resources\QbgPrepayments\Schemas\QbgPrepaymentForm;
use App\Filament\Resources\QbgPrepayments\Tables\QbgPrepaymentsTable;
use App\Models\QbgPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class QbgPrepaymentResource extends Resource
{
    protected static ?string $model = QbgPrepayment::class;
    // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'Prepayment';
    protected static ?string $modelLabel = ' Prepayment';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Prepayment QBG';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'QbgPrepayment';

    public static function form(Schema $schema): Schema
    {
        return QbgPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return QbgPrepaymentsTable::configure($table);
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
            'index' => ListQbgPrepayments::route('/'),
            'create' => CreateQbgPrepayment::route('/create'),
            'edit' => EditQbgPrepayment::route('/{record}/edit'),
            'view' => ViewQbgPrepayment::route('/{record}'),
        ];
    }
}
