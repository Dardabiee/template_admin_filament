<?php

namespace App\Filament\Resources\SwiSops;

use App\Filament\Resources\SwiSops\Pages\CreateSwiSop;
use App\Filament\Resources\SwiSops\Pages\EditSwiSop;
use App\Filament\Resources\SwiSops\Pages\ListSwiSops;
use App\Filament\Resources\SwiSops\Schemas\SwiSopForm;
use App\Filament\Resources\SwiSops\Tables\SwiSopsTable;
use App\Models\SwiSop;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwiSopResource extends Resource
{
    protected static ?string $model = SwiSop::class;
    protected static ?string $navigationLabel = 'SOP';
    protected static ?string $modelLabel = 'View SOP';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Table SOP  ';
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwiSop';

    public static function form(Schema $schema): Schema
    {
        return SwiSopForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwiSopsTable::configure($table);
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
            'index' => ListSwiSops::route('/'),
            'create' => CreateSwiSop::route('/create'),
            'edit' => EditSwiSop::route('/{record}/edit'),
        ];
    }
}
