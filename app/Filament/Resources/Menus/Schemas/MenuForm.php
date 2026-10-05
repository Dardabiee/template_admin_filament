<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(2)
                    ->schema([
                        // Kolom Kiri/Utama (2/3 Lebar Screen)
                        Grid::make(1)
                            ->columnSpan(2)
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('title')
                                            ->label('Nama Menu')
                                            ->placeholder('misal: Management User')
                                            ->required()
                                            ->maxLength(255),

                                        TextInput::make('url')
                                            ->label('Route / URL')
                                            ->placeholder('admin.users.index atau /admin/users')
                                            ->required(),

                                        Select::make('parent_id')
                                            ->label('Parent Menu')
                                            ->relationship('parent', 'title')
                                            ->searchable()
                                            ->placeholder('Pilih jika ini ada di dalam sub-menu')
                                            ->nullable(),
                                    ]),
                            ]),

                        // Kolom Kanan/Sidebar Form (1/3 Lebar Screen)
                        Grid::make(1)
                            ->columnSpan(2)
                            ->schema([
                                Section::make()
                                    ->schema([
                                        TextInput::make('icon')
                                            ->label('Heroicon Class')
                                            ->placeholder('heroicon-o-users')
                                            ->helperText('Gunakan format heroicon-o-*'),

                                        TextInput::make('order')
                                            ->label('Urutan (Sort)')
                                            ->numeric()
                                            ->default(0)
                                            ->required(),

                                        Toggle::make('is_active')
                                            ->label('Status Aktif')
                                            ->default(true)
                                            ->onColor('success')
                                            ->offColor('danger'),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}