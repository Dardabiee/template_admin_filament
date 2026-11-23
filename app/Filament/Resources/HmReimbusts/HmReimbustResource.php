<?php

namespace App\Filament\Resources\HmReimbusts;

use App\Filament\Resources\HmReimbusts\Pages\CreateHmReimbust;
use App\Filament\Resources\HmReimbusts\Pages\EditHmReimbust;
use App\Filament\Resources\HmReimbusts\Pages\ListHmReimbusts;
use App\Filament\Resources\HmReimbusts\Pages\ViewHmReimbust;
use App\Filament\Resources\HmReimbusts\Schemas\HmReimbustForm;
use App\Filament\Resources\HmReimbusts\Tables\HmReimbustsTable;
use App\Models\HmReimbust;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class HmReimbustResource extends Resource
{
    protected static ?string $model = HmReimbust::class;
     // 1. Mengatur Label Menu Sidebar (Hilangkan huruf "s" di sini)
    protected static ?string $navigationLabel = 'HMReimbust';
    protected static ?string $modelLabel = ' Reimbust';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table Reimbust HM';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $recordTitleAttribute = 'HmReimbust';

    public static function form(Schema $schema): Schema
    {
        return HmReimbustForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return HmReimbustsTable::configure($table);
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
            'index' => ListHmReimbusts::route('/'),
            'create' => CreateHmReimbust::route('/create'),
            'edit' => EditHmReimbust::route('/{record}/edit'),
            'view' => ViewHmReimbust::route('/{record}')
        ];
    }
}
