<?php

namespace App\Filament\Resources\KpsPrepayments\Tables;

use App\Models\KpsPrepayment;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class KpsPrepaymentsTable
{   
    protected static ?string $model = KpsPrepayment::class;

    public static function configure(Table $table): Table
    {
        $user = Auth::user();
        $userName = $user->name;
        $userRole = $user->getRoleNames()->first();

        return $table
            ->modifyQueryUsing(function (Builder $query) use ($userRole, $userName) {
                if ($userName === 'eko' || $userRole === 'Super Admin') {
                return; 
                }

                if ($userRole === 'Finance') {
                    $query->where(function ($q) use ($userName) {
                    // Muncul jika status masih waiting/on-process di level 1, atau dia sendiri yang mengajukan
                    $q->where('app_name', $userName)
                    ->where(function ($sub) {
                        $sub->where('app_status', 'waiting')
                            ->orWhere(function ($ready) {
                                $ready->where('app_status', 'approved')
                                    ->where('app2_status', 'approved')
                                    ->where('payment_status', 'unpaid');
                            });
                    });
                }); 
                } elseif ($userRole === 'Manager' || $userRole === 'Direksi') {
                    $query->where(function ($q) use ($userName) {
                        // Manager/Direksi HANYA BISA MELIHAT jika Finance (app_status) sudah 'approved'
                        // dan app2_name sesuai dengan nama user login yang bertugas di sub bisnis tersebut
                        $q->where('app_status', 'approved')
                          ->where('app2_name', $userName)
                          ->where('app2_status', 'waiting');
                    });
                }
            }) 
            ->columns([
                TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color( fn ($state): string => match ($state){
                        'on-process' => 'primary',
                        'revised' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                TextColumn::make('kode_prepayment')
                    ->searchable(),
                TextColumn::make('user.fullname')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('status')
                //     ->searchable(),
                // TextColumn::make('jabatan')
                //     ->searchable(),
                // TextColumn::make('divisi')
                //     ->searchable(),
                TextColumn::make('tgl_prepayment')
                    ->date()
                    ->sortable(),
                TextColumn::make('prepayment')
                    ->searchable(),
                
                TextColumn::make('total_nominal')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('no_rek')
                //     ->searchable(),
                TextColumn::make('payment_status')
                    ->label('Payment Status')
                    ->formatStateUsing(fn ($state, $record): string => "{$state} ({$record->app_name})")
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
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Filter Status
                    ')
                    ->options([
                        'on-process' => 'On Process',
                        'revised' => 'Revised',
                        'approved' => 'Approved',
                        'rejected' => 'Rejected',
                    ]),
            ])

            ->actions([
                ViewAction::make()
                ->iconButton(),
                // DeleteAction::make()
                // ->iconButton(),
                Action::make('bukti bayar')
                    ->icon('heroicon-o-document')
                    ->iconButton()
                    ->color('success')
                    ->visible(fn ($record) => $record->payment_status === 'paid' && !empty($record->attachment))
                    ->url(fn ($record) => asset('/assets/img/documents/prepayments/kps/' . $record->attachment))
                    ->openUrlInNewTab(),    
            ], position: RecordActionsPosition::BeforeColumns)
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
