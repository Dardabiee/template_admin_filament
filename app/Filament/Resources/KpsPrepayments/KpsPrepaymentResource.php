<?php

namespace App\Filament\Resources\KpsPrepayments;


use App\Filament\Resources\KpsPrepayments\Pages\EditKpsPrepayment;
use App\Filament\Resources\KpsPrepayments\Pages\ListKpsPrepayments;
use App\Filament\Resources\KpsPrepayments\Pages\ViewKpsPrepayment;
use App\Filament\Resources\KpsPrepayments\Schemas\KpsPrepaymentForm;
use App\Filament\Resources\KpsPrepayments\Tables\KpsPrepaymentsTable;
use App\Models\KpsPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KpsPrepaymentResource extends Resource
{
    protected static ?string $model = KpsPrepayment::class;
// Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
     protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'KpsPrepayment';

    public static function form(Schema $schema): Schema
    {
        return KpsPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KpsPrepaymentsTable::configure($table);
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
            'index' => ListKpsPrepayments::route('/'),
            // 'create' => CreateKpsPrepayment::route('/create'),
            'edit' => EditKpsPrepayment::route('/{record}/edit'),
            'view' => ViewKpsPrepayment::route('/{record}')
        ];
    }
}
