<?php

namespace App\Filament\Resources\SwConfirmLetters;

use App\Filament\Resources\SwConfirmLetters\Pages\CreateSwConfirmLetter;
use App\Filament\Resources\SwConfirmLetters\Pages\EditSwConfirmLetter;
use App\Filament\Resources\SwConfirmLetters\Pages\ListSwConfirmLetters;
use App\Filament\Resources\SwConfirmLetters\Schemas\SwConfirmLetterForm;
use App\Filament\Resources\SwConfirmLetters\Tables\SwConfirmLettersTable;
use App\Models\SwConfirmLetter;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SwConfirmLetterResource extends Resource
{
    protected static ?string $model = SwConfirmLetter::class;

    protected static ?string $navigationLabel = 'SW Confirm Letter';
    protected static ?string $modelLabel = 'View Confirm Letter';

    // 2. Mengatur Judul Plural (Nama Halaman/Tabel) agar tidak pakai "s" otomatis
    protected static ?string $pluralModelLabel = 'SW Confirm Letter';

    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'SwConfirmLetter';

    public static function form(Schema $schema): Schema
    {
        return SwConfirmLetterForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SwConfirmLettersTable::configure($table);
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
            'index' => ListSwConfirmLetters::route('/'),
            'create' => CreateSwConfirmLetter::route('/create'),
            'edit' => EditSwConfirmLetter::route('/{record}/edit'),
        ];
    }
}
