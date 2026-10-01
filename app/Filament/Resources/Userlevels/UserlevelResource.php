<?php

namespace App\Filament\Resources\Userlevels;

use App\Filament\Resources\Userlevels\Pages\CreateUserlevel;
use App\Filament\Resources\Userlevels\Pages\EditUserlevel;
use App\Filament\Resources\Userlevels\Pages\ListUserlevels;
use App\Filament\Resources\Userlevels\Schemas\UserlevelForm;
use App\Filament\Resources\Userlevels\Tables\UserlevelsTable;
use App\Models\Userlevel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use BezhanSalleh\FilamentShield\Support\Utils;
use Filament\Actions\Action;
use Filament\Forms\Components\CheckboxList;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Spatie\Permission\Models\Permission;

class UserlevelResource extends Resource
{
    protected static ?string $model = Userlevel::class;

       // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Userlevels';

    public static function form(Schema $schema): Schema
    {
        return UserlevelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UserlevelsTable::configure($table);
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
            'index' => ListUserlevels::route('/'),
        ];
    }
}
