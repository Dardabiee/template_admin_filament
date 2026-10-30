<?php

namespace App\Filament\Resources\PuPenawarans;

use App\Filament\Resources\PuPenawarans\Pages\CreatePuPenawaran;
use App\Filament\Resources\PuPenawarans\Pages\EditPuPenawaran;
use App\Filament\Resources\PuPenawarans\Pages\ListPuPenawarans;
use App\Filament\Resources\PuPenawarans\Schemas\PuPenawaranForm;
use App\Filament\Resources\PuPenawarans\Tables\PuPenawaransTable;
use App\Models\PuPenawaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuPenawaranResource extends Resource
{
    protected static ?string $model = PuPenawaran::class;

    protected static ?string $navigationLabel = 'Penawaran';
    protected static ?string $modelLabel = 'Penawaran';
     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Penawaran';

    protected static bool $shouldRegisterNavigation = false;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuPenawaran';

    public static function form(Schema $schema): Schema
    {
        return PuPenawaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuPenawaransTable::configure($table);
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
            'index' => ListPuPenawarans::route('/'),
            'create' => CreatePuPenawaran::route('/create'),
            'edit' => EditPuPenawaran::route('/{record}/edit'),
        ];
    }
}
