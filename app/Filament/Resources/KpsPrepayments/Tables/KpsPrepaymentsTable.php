<?php

namespace App\Filament\Resources\KpsPrepayments\Tables;

use App\Models\KpsPrepayment;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Table;

class KpsPrepaymentsTable
{   
    protected static ?string $model = KpsPrepayment::class;
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kode_prepayment')
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
                TextColumn::make('user.fullname')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('status')
                //     ->searchable(),
                // TextColumn::make('jabatan')
                //     ->searchable(),
                // TextColumn::make('divisi')
                //     ->searchable(),
                TextColumn::make('prepayment')
                    ->searchable(),
                TextColumn::make('tgl_prepayment')
                    ->date()
                    ->sortable(),
                TextColumn::make('total_nominal')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('no_rek')
                //     ->searchable(),
                TextColumn::make('payment_status')
                    ->searchable(),
                // TextColumn::make('tgl_pembayaran')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('attachment')
                //     ->searchable(),
                // TextColumn::make('app_name')
                //     ->searchable(),
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
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('is_active')
                //     ->numeric()
                //     ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ViewAction::make()
                ->iconButton(),
            ], position: RecordActionsPosition::BeforeCells)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
