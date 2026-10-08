<?php

namespace App\Filament\Resources\KpsReimbusts\Tables;

use App\Filament\Resources\KpsReimbusts\Pages\ViewKpsReimbust;
use APP\Models\KpsReimbust;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class KpsReimbustsTable
{   
    protected static ?string $model = KpsReimbust::class;

    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_reimbust')
                    ->searchable(),
                // TextColumn::make('kode_prepayment')
                //     ->searchable(),
                TextColumn::make('user.fullname') // Mengambil nama dari relasi tbl_user/tbl_data_user
                    ->label('Nama Pengaju')
                    ->searchable(),
                TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color( fn ($state): string => match ($state){
                        'on-process' => 'primary',
                        'revised' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                TextColumn::make('jabatan')
                    ->searchable(),
                TextColumn::make('departemen')
                    ->searchable(),
                TextColumn::make('sifat_pelaporan')
                    ->searchable(),
                TextColumn::make('tgl_pengajuan')
                    ->date()
                    ->sortable(),
                TextColumn::make('jumlah_prepayment')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('no_rek')
                //     ->searchable(),
                TextColumn::make('payment_status')
                    ->searchable(),
                TextColumn::make('tgl_pembayaran')
                    ->dateTime()
                    ->sortable(),
                // TextColumn::make('attachment')
                //     ->searchable(),
                TextColumn::make('app_name')
                    ->searchable(),
                // TextColumn::make('app_status')
                //     ->searchable(),
                // TextColumn::make('app_date')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('app2_name')
                //     ->searchable(),
                // TextColumn::make('app2_status')
                //     ->searchable(),
                // TextColumn::make('app2_date')
                //     ->dateTime()
                //     ->sortable(),
                
                    
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter Status')
                    ->options([
                        'on-process' => 'On Process',
                        'revised' => 'Revised',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                ViewAction::make()
                ->iconButton()
                ->url(fn ($record): string => ViewKpsReimbust::getUrl([$record->getKey()])),
            ], position: RecordActionsPosition::BeforeCells)
            // ->toolbarActions([
            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ])
            ;
    }
}
