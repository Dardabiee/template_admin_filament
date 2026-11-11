<?php

namespace App\Filament\Resources\CtzPrepayments;

use App\Filament\Resources\CtzPrepayments\Pages\CreateCtzPrepayment;
use App\Filament\Resources\CtzPrepayments\Pages\EditCtzPrepayment;
use App\Filament\Resources\CtzPrepayments\Pages\ListCtzPrepayments;
use App\Filament\Resources\CtzPrepayments\Pages\ViewCtzPrepayment;
use App\Filament\Resources\CtzPrepayments\Schemas\CtzPrepaymentForm;
use App\Filament\Resources\CtzPrepayments\Tables\CtzPrepaymentsTable;
use App\Models\CtzPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CtzPrepaymentResource extends Resource
{
    protected static ?string $model = CtzPrepayment::class;
    protected static ?string $navigationLabel = 'Prepayment';
    protected static ?string $modelLabel = ' Prepayment';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Prepayment';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'CtzPrepayment';

    public static function form(Schema $schema): Schema
    {
        return CtzPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CtzPrepaymentsTable::configure($table);
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
            'index' => ListCtzPrepayments::route('/'),
            'create' => CreateCtzPrepayment::route('/create'),
            'edit' => EditCtzPrepayment::route('/{record}/edit'),
            'view' => ViewCtzPrepayment::route('/{record}')
        ];
    }
}
