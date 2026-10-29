<?php

namespace App\Filament\Resources\KpsReimbusts\Tables;

use App\Filament\Resources\KpsReimbusts\Pages\ViewKpsReimbust;
use APP\Models\KpsReimbust;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Enums\RecordActionsPosition;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class KpsReimbustsTable
{   
    protected static ?string $model = KpsReimbust::class;

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
                    // Manager/Direksi HANYA BISA MELIHAT jika Finance sudah approve (app_status = approved)
                    $q->where('app_status', 'approved')
                      ->where('app2_name', $userName)
                      ->where('app2_status', 'waiting');
                    //   ->where(function ($sub) use ($userName) {
                    //       $sub;
                    //   });
                });
              }
            }) 
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('kode_reimbust')
                    ->searchable()
                    ->formatStateUsing(fn ($state) => strtoupper($state))
                    ,
                // TextColumn::make('kode_prepayment')
                //     ->searchable(),
                TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color( fn ($state): string => match ($state){
                        'on-process' => 'primary',
                        'revised' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    }),
                TextColumn::make('user.fullname') // Mengambil nama dari relasi tbl_user/tbl_data_user
                    ->label('Nama')
                    ->searchable(),
                // TextColumn::make('jabatan')
                //     ->searchable(),
                // TextColumn::make('departemen')
                //     ->searchable(),
                TextColumn::make('sifat_pelaporan')
                    ->searchable(),
                TextColumn::make('tgl_pengajuan')
                    ->date()
                    ->sortable(),
                TextColumn::make('jumlah_prepayment')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('tujuan')
                    ->searchable(),
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
                    // ->toggleable(isToggledHiddenByDefault: true),
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
                
                Action::make('bukti_bayar')
                    ->icon('heroicon-o-document')
                    ->iconButton()
                    // ->label('Bukti Bayar')
                    ->color('success')
                    ->visible(fn ($record) => $record->payment_status === 'paid' && !empty($record->attachment))
                    // Membuka file attachment di tab baru browser
                    ->url(fn ($record) => asset('/assets/img/documents/reimbust/kps/' . $record->attachment )) // Sesuaikan path folder storage jika berbeda
                    ->openUrlInNewTab(),
            ], position: RecordActionsPosition::BeforeColumns)
            // ->toolbarActions([
            //     BulkActionGroup::make([
            //         DeleteBulkAction::make(),
            //     ]),
            // ])
            ;
    }
}
