<?php

namespace App\Filament\Resources\KpsDeklarasis;

use App\Filament\Resources\KpsDeklarasis\Pages\CreateKpsDeklarasi;
use App\Filament\Resources\KpsDeklarasis\Pages\EditKpsDeklarasi;
use App\Filament\Resources\KpsDeklarasis\Pages\ListKpsDeklarasis;
use App\Filament\Resources\KpsDeklarasis\Schemas\KpsDeklarasiForm;
use App\Filament\Resources\KpsDeklarasis\Tables\KpsDeklarasisTable;
use App\Models\KpsDeklarasi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KpsDeklarasiResource extends Resource
{
    protected static ?string $model = KpsDeklarasi::class;

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
     protected static bool $shouldRegisterNavigation = false;
     
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'KpsDeklarasi';

    public static function form(Schema $schema): Schema
    {
        return KpsDeklarasiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KpsDeklarasisTable::configure($table);
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
            'index' => ListKpsDeklarasis::route('/'),
            'create' => CreateKpsDeklarasi::route('/create'),
            'edit' => EditKpsDeklarasi::route('/{record}/edit'),
        ];
    }
}
