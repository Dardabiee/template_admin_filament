<?php

namespace App\Filament\Resources\KpsPrepayments\Schemas;


use App\Models\KpsPrepayment;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class KpsPrepaymentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Prepayment Form')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                // Kolom Kiri
                                Grid::make(1)
                                    ->schema([
                                        DatePicker::make('tgl_prepayment')
                                            ->label('Tanggal Prepayment')
                                            ->required(),
                                        
                                        TextInput::make('kode_prepayment')
                                            ->label('Kode Prepayment')
                                            ->disabled()
                                            ->dehydrated(false),

                                        Radio::make('tipe_rekening')
                                            ->label('No Rekening')
                                            ->options([
                                                'terdaftar' => 'Rekening terdaftar',
                                                'baru' => 'Rekening baru',
                                            ])
                                            ->default('terdaftar')
                                            ->live()
                                            ->inline()
                                            ->dehydrated(false),

                                        Select::make('no_rek')
                                            ->label('')
                                            ->placeholder('Pilih rekening tujuan')
                                            ->options(fn () => KpsPrepayment::query()
                                                ->where('id_user', auth()->user()->id_user) // sesuaikan mapping user login
                                                ->whereNotNull('no_rek')
                                                ->distinct()
                                                ->pluck('no_rek', 'no_rek'))
                                            ->visible(fn (Get $get) => $get('tipe_rekening') === 'terdaftar')
                                            ->required(fn (Get $get) => $get('tipe_rekening') === 'terdaftar'),

                                        TextInput::make('no_rek')
                                            ->label('')
                                            ->placeholder('Masukkan no rekening baru')
                                            ->visible(fn (Get $get) => $get('tipe_rekening') === 'baru')
                                            ->required(fn (Get $get) => $get('tipe_rekening') === 'baru'),
                                    ]),

                                // Kolom Kanan
                                Grid::make(1)
                                    ->schema([
                                        TextInput::make('prepayment')
                                            ->label('Prepayment')
                                            ->placeholder('Prepayment for....')
                                            ->required(),

                                        Textarea::make('tujuan')
                                            ->label('Tujuan')
                                            ->placeholder('Masukkan tujuan prepayment...')
                                            ->rows(5)
                                            ->required(),
                                    ]),
                                
                            ]),

                        // Repeater Tabel untuk Detail Prepayment
                    ]),
                Section::make('Details')
                    ->schema([
                        Grid::make(3)
                            ->schema([

                                Repeater::make('details')
                            ->relationship('details')
                            ->schema([
                                TextInput::make('rincian')
                                    ->label('Rincian')
                                    ->placeholder('Input here...')
                                    ->required(),
                                
                                TextInput::make('nominal')
                                    ->label('Nominal')
                                    ->numeric()
                                    ->placeholder('Input here...')
                                    ->required(),
                                TextInput::make('Keterangan')
                                    ->label('Keterangan')
                                    ->placeholder('Input here...')
                                    ->required(),
                            ])
                            ->columns(1)
                            ->defaultItems(1)
                            ->addActionLabel('Add')
                            ->reorderable(false)
                            ->columnSpanFull(),
                            ])
                    ])
            ]);
    }
}