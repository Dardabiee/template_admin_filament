<?php

namespace App\Filament\Resources\PuTandaTerimas;

use App\Filament\Resources\PuTandaTerimas\Pages\CreatePuTandaTerima;
use App\Filament\Resources\PuTandaTerimas\Pages\EditPuTandaTerima;
use App\Filament\Resources\PuTandaTerimas\Pages\ListPuTandaTerimas;
use App\Filament\Resources\PuTandaTerimas\Schemas\PuTandaTerimaForm;
use App\Filament\Resources\PuTandaTerimas\Tables\PuTandaTerimasTable;
use App\Models\PuTandaTerima;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PuTandaTerimaResource extends Resource
{
    protected static ?string $model = PuTandaTerima::class;

    protected static ?string $navigationLabel = 'Table Tanda Terima';
    protected static ?string $modelLabel = 'Tanda Terima';

     // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'Tanda Terima';

    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'PuTandaTerima';

    public static function form(Schema $schema): Schema
    {
        return PuTandaTerimaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PuTandaTerimasTable::configure($table);
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
            'index' => ListPuTandaTerimas::route('/'),
            'create' => CreatePuTandaTerima::route('/create'),
            'edit' => EditPuTandaTerima::route('/{record}/edit'),
        ];
    }
}
