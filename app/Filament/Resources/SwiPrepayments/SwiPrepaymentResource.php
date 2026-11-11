<?php

namespace App\Filament\Resources\SwiPrepayments;

use App\Filament\Resources\SwiPrepayments\Pages\CreateSwiPrepayment;
use App\Filament\Resources\SwiPrepayments\Pages\EditSwiPrepayment;
use App\Filament\Resources\SwiPrepayments\Pages\ListSwiPrepayments;
use App\Filament\Resources\SwiPrepayments\Pages\ViewSwiPrepayment;
use App\Filament\Resources\SwiPrepayments\Schemas\SwiPrepaymentForm;
use App\Filament\Resources\SwiPrepayments\Tables\SwiPrepaymentsTable;
use App\Models\SwiPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwiPrepaymentResource extends Resource
{
    protected static ?string $model = SwiPrepayment::class;
    protected static ?string $navigationLabel = 'SWD Prepayment';
    protected static ?string $modelLabel = ' Prepayment';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Prepayment SWD ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwiPrepayment';

    public static function form(Schema $schema): Schema
    {
        return SwiPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwiPrepaymentsTable::configure($table);
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
            'index' => ListSwiPrepayments::route('/'),
            'create' => CreateSwiPrepayment::route('/create'),
            'edit' => EditSwiPrepayment::route('/{record}/edit'),
            'view' => ViewSwiPrepayment::route('/{record}')
        ];
    }
}
