<?php

namespace App\Filament\Resources\KpsKaryawans;

use App\Filament\Resources\KpsKaryawans\Pages\CreateKpsKaryawan;
use App\Filament\Resources\KpsKaryawans\Pages\EditKpsKaryawan;
use App\Filament\Resources\KpsKaryawans\Pages\ListKpsKaryawans;
use App\Filament\Resources\KpsKaryawans\Pages\ViewKpsKaryawan;
use App\Filament\Resources\KpsKaryawans\Schemas\KpsKaryawanForm;
use App\Filament\Resources\KpsKaryawans\Schemas\KpsKaryawanInfolist;
use App\Filament\Resources\KpsKaryawans\Tables\KpsKaryawansTable;
use App\Models\KpsKaryawan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class KpsKaryawanResource extends Resource
{
    protected static ?string $model = KpsKaryawan::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'KpsKaryawan';

    public static function form(Schema $schema): Schema
    {
        return KpsKaryawanForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return KpsKaryawanInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return KpsKaryawansTable::configure($table);
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
            'index' => ListKpsKaryawans::route('/'),
            'create' => CreateKpsKaryawan::route('/create'),
            'view' => ViewKpsKaryawan::route('/{record}'),
            'edit' => EditKpsKaryawan::route('/{record}/edit'),
        ];
    }
}
