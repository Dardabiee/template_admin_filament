<?php

namespace App\Filament\Resources\SmlPrepayments;

use App\Filament\Resources\SmlPrepayments\Pages\CreateSmlPrepayment;
use App\Filament\Resources\SmlPrepayments\Pages\EditSmlPrepayment;
use App\Filament\Resources\SmlPrepayments\Pages\ListSmlPrepayments;
use App\Filament\Resources\SmlPrepayments\Pages\ViewSmlPrepayment;
use App\Filament\Resources\SmlPrepayments\Schemas\SmlPrepaymentForm;
use App\Filament\Resources\SmlPrepayments\Tables\SmlPrepaymentsTable;
use App\Models\SmlPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SmlPrepaymentResource extends Resource
{
    protected static ?string $model = SmlPrepayment::class;
    protected static ?string $navigationLabel = 'Prepayments';
    protected static ?string $modelLabel = ' Prepayments';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Prepayments ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SmlPrepayment';

    public static function form(Schema $schema): Schema
    {
        return SmlPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SmlPrepaymentsTable::configure($table);
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
            'index' => ListSmlPrepayments::route('/'),
            'create' => CreateSmlPrepayment::route('/create'),
            'edit' => EditSmlPrepayment::route('/{record}/edit'),
            'view' => ViewSmlPrepayment::route('/{record}')
        ];
    }
}
