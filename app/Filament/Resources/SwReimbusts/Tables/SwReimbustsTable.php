<?php

namespace App\Filament\Resources\SwReimbusts\Tables;


use App\Filament\Resources\SwReimbusts\Pages\ViewSwReimbust;
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
use Illuminate\Support\HtmlString;

class SwReimbustsTable
{
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
                    ->formatStateUsing(fn ($state) => strtoupper($state)),
                 TextColumn::make('payment_status')
                    ->searchable()
                    ->badge()
                    ->color( fn ($state): string => match ($state){
                        'on-process' => 'primary',
                        'revised' => 'warning',
                        'paid' => 'success',
                        'unpaid' => 'danger',
                    }),
                // TextColumn::make('kode_prepayment')
                //     ->searchable(),
                TextColumn::make('user.fullname')
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
                TextColumn::make('status')
                    ->label('Status')
                    ->formatStateUsing(fn ($state, $record): string => "{$state} ({$record->app_name})")
                    ->searchable(),
                // TextColumn::make('no_rek')
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
               
                // TextColumn::make('tgl_pembayaran')
                //     ->dateTime()
                //     ->sortable(),
                // TextColumn::make('attachment')
                //     ->searchable(),
            ])
            ->defaultSort('created_at', 'desc')
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
                ->url(fn ($record): string => ViewSwReimbust::getUrl([$record->getKey()])),
                
                Action::make('bukti_bayar')
                    ->icon('heroicon-o-document')
                    ->iconButton()
                    ->color('success')
                    ->tooltip('Lihat Bukti Pembayaran')
                    ->visible(fn ($record) => $record->payment_status === 'paid' && !empty($record->attachment))
                    ->modalHeading('Bukti Pembayaran')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Tutup')
                    ->modalContent(function ($record) {
                        // Sesuaikan cara mendapatkan kode tenant dari $record (misal: $record->tenant_code atau 'kps')
                        $tenant = $record->tenant_code ?? 'kps'; 

                        $url = URL::temporarySignedRoute(
                            'holding.document.show',
                            now()->addMinutes(30),
                            [
                                'tenant' => $tenant,
                                'module' => 'reimbust',
                                'type'   => 'attachment',
                                'id'     => $record->id,
                            ]
                        );

                        $isPdf = str_ends_with(strtolower($record->attachment), '.pdf');

                        if ($isPdf) {
                            return new HtmlString(
                                '<div class="space-y-2">' .
                                    '<iframe src="' . e($url) . '" class="w-full rounded border" style="height: 75vh;"></iframe>' .
                                    '<div class="text-right">' .
                                        '<a href="' . e($url . '&download=1') . '" class="text-sm text-primary-600 hover:underline">Unduh PDF</a>' .
                                    '</div>' .
                                '</div>'
                            );
                        }

                        return new HtmlString(
                            '<div class="space-y-2 text-center">' .
                                '<img src="' . e($url) . '" alt="Bukti pembayaran" style="display:block; max-width:100%; max-height:75vh; height:auto; margin:0 auto;" class="rounded">' .
                                '<div class="text-right">' .
                                    '<a href="' . e($url . '&download=1') . '" class="text-sm text-primary-600 hover:underline">Unduh Gambar</a>' .
                                '</div>' .
                            '</div>'
                        );
                    }),
            ], position: RecordActionsPosition::BeforeColumns);
    }
}
