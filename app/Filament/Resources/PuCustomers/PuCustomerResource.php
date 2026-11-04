<?php

namespace App\Filament\Resources\PuCustomers;

use App\Filament\Resources\PuCustomers\Pages\CreatePuCustomer;
use App\Filament\Resources\PuCustomers\Pages\EditPuCustomer;
use App\Filament\Resources\PuCustomers\Pages\ListPuCustomers;
use App\Filament\Resources\PuCustomers\Schemas\PuCustomerForm;
use App\Filament\Resources\PuCustomers\Tables\PuCustomersTable;
use App\Models\PuCustomer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuCustomerResource extends Resource
{
    protected static ?string $model = PuCustomer::class;

    protected static ?string $navigationLabel = 'Customer PU';
    protected static ?string $modelLabel = 'View Customer';
    protected static ?string $pluralModelLabel = 'Customer';
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuCustomer';

    public static function form(Schema $schema): Schema
    {
        return PuCustomerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuCustomersTable::configure($table);
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
            'index' => ListPuCustomers::route('/'),
            'create' => CreatePuCustomer::route('/create'),
            'edit' => EditPuCustomer::route('/{record}/edit'),
        ];
    }
}
