<?php

namespace App\Filament\Resources\KpsKontrakPkwts;

use App\Filament\Resources\KpsKontrakPkwts\Pages\CreateKpsKontrakPkwt;
use App\Filament\Resources\KpsKontrakPkwts\Pages\EditKpsKontrakPkwt;
use App\Filament\Resources\KpsKontrakPkwts\Pages\ListKpsKontrakPkwts;
use App\Filament\Resources\KpsKontrakPkwts\Pages\ViewKpsKontrakPkwt;
use App\Filament\Resources\KpsKontrakPkwts\Schemas\KpsKontrakPkwtForm;
use App\Filament\Resources\KpsKontrakPkwts\Tables\KpsKontrakPkwtsTable;
use App\Filament\Resources\KpsKontrakPkwts\Schemas\KpsKontrakPkwtinfolist;
use App\Models\KpsKontrakPkwt;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KpsKontrakPkwtResource extends Resource
{
    protected static ?string $model = KpsKontrakPkwt::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'KpsKontrakPkwt';

    public static function form(Schema $schema): Schema
    {
        return KpsKontrakPkwtForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KpsKontrakPkwtinfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KpsKontrakPkwtsTable::configure($table);
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
            'index' => ListKpsKontrakPkwts::route('/'),
            'create' => CreateKpsKontrakPkwt::route('/create'),
            'view' => ViewKpsKontrakPkwt::route('/{record}'),
            'edit' => EditKpsKontrakPkwt::route('/{record}/edit'),
        ];
    }
}
