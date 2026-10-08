<?php

namespace App\Filament\Resources\KpsKontrakPkwts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;

class kpsKontrakPkwtinfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Kontrak PKWT')
                ->schema([
                    Grid::make([
                        'default' => 1,
                        // 'md' => 2,
                        'lg' => 2,
                    ])
                        ->schema([
                            TextEntry::make('no_perjanjian')
                                ->label('No Perjanjian'),
                            TextEntry::make('id_user')
                                ->label('ID User')
                                ->numeric()->weight(FontWeight::Bold),
                            TextEntry::make('npk')
                                ->label('NPK')
                                ->numeric()->weight(FontWeight::Bold),
                            TextEntry::make('jk_awal')
                                ->label('Jangka Waktu Awal')
                                ->date()->weight(FontWeight::Bold),
                            TextEntry::make('jk_akhir')
                                ->label('Jangka Waktu Akhir')
                                ->date()->weight(FontWeight::Bold),
                            TextEntry::make('jangka_waktu')
                                ->label('Jangka Waktu')->weight(FontWeight::Bold),
                            TextEntry::make('hari')
                                ->label('Hari')->weight(FontWeight::Bold),
                            TextEntry::make('tanggal')
                                ->label('Tanggal')->weight(FontWeight::Bold),
                            TextEntry::make('bulan')
                                ->label('Bulan')->weight(FontWeight::Bold),
                            TextEntry::make('tahun')
                                ->label('Tahun')->weight(FontWeight::Bold),
                        ]),
                ]),

            Section::make('Kompensasi & Tunjangan')
                ->schema([
                    Grid::make([
                        'default' => 1,
                        // 'md' => 2,
                        'lg' => 2,
                    ])
                        ->schema([
                            TextEntry::make('gaji')
                                ->label('Gaji')
                                ->numeric()->weight(FontWeight::Bold),
                            TextEntry::make('tj_pulsa')
                                ->label('Tunjangan Pulsa')
                                ->numeric()->weight(FontWeight::Bold),
                            TextEntry::make('tj_ops')
                                ->label('Tunjangan Operasional')
                                ->numeric()->weight(FontWeight::Bold),
                            TextEntry::make('thr')
                                ->label('THR')->weight(FontWeight::Bold),
                            TextEntry::make('tj_kehadiran')
                                ->label('Tunjangan Kehadiran')
                                ->numeric()->weight(FontWeight::Bold),
                            TextEntry::make('insentif')
                                ->label('Insentif')->weight(FontWeight::Bold),
                        ]),
                ])
                
                ,

            Section::make('Status Persetujuan')
                ->schema([
                    Grid::make([
                        'default' => 1,
                        'md' => 2,
                    ])
                        ->schema([
                            TextEntry::make('app_status')
                                ->label('Approval 1 Status')
                                ->badge()
                                ->default('waiting'),
                            TextEntry::make('app_date')
                                ->label('Approval 1 Date')
                                ->dateTime()->weight(FontWeight::Bold),
                            TextEntry::make('app2_status')
                                ->label('Approval 2 Status')
                                ->badge()
                                ->default('waiting'),
                            TextEntry::make('app2_date')
                                ->label('Approval 2 Date')
                                ->dateTime(),
                        ]),
                ]),
        ]);
    }
}

//                          ->default('waiting'),
//                 TextEntry::make('app_date'),
//                 TextEntry::make('app2_status')
//                          ->default('waiting'),
//                 TextEntry::make('app2_date')
//          ]);