<?php

namespace App\Filament\Resources\HmPrepayments;

use App\Filament\Resources\HmPrepayments\Pages\CreateHmPrepayment;
use App\Filament\Resources\HmPrepayments\Pages\EditHmPrepayment;
use App\Filament\Resources\HmPrepayments\Pages\ListHmPrepayments;
use App\Filament\Resources\HmPrepayments\Pages\ViewHmPrepayment;
use App\Filament\Resources\HmPrepayments\Schemas\HmPrepaymentForm;
use App\Filament\Resources\HmPrepayments\Tables\HmPrepaymentsTable;
use App\Models\HmPrepayment;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HmPrepaymentResource extends Resource
{
    protected static ?string $model = HmPrepayment::class;

    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'HmPrepayment';

    public static function form(Schema $schema): Schema
    {
        return HmPrepaymentForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HmPrepaymentsTable::configure($table);
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
            'index' => ListHmPrepayments::route('/'),
            'create' => CreateHmPrepayment::route('/create'),
            'edit' => EditHmPrepayment::route('/{record}/edit'),
            'view' => ViewHmPrepayment::route('/{record}')
        ];
    }
}
