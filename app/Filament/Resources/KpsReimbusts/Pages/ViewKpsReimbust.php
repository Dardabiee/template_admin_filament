<?php

namespace App\Filament\Resources\KpsReimbusts\Pages;

use App\Filament\Resources\KpsReimbusts\KpsReimbustResource;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Support\Facades\Auth;

class ViewKpsReimbust extends ViewRecord
{
    protected static string $resource = KpsReimbustResource::class;

    protected string $view = 'filament.pages.view-kps-reimbust';

      protected function getHeaderActions(): array
        {
            $user = Auth::user();
            $userName = $user->name;
            $userRole = $user->getRoleNames()->first();

            $actions = [];

            // Tombol APPROVAL UNTUK FINANCE (Tier 1)
            if ($userRole === 'Finance' || $userRole === 'Super Admin') {
                $actions[] = Action::make('action_finance')
                    ->label('Proses Approval')
                    ->color('primary')
                    ->icon('heroicon-o-check-badge')
                    ->visible(fn ($record) => $record->app_status === 'waiting')
                    ->form([
                        Select::make('action_type')
                            ->label('Tujuan Aksi')
                            ->options([
                                'approve' => 'Approve',
                                'rejected' => 'Rejected',
                                'revised' => 'Revise',
                            ])
                            ->required()
                            ->reactive(),
                        Textarea::make('app_keterangan')
                            ->label('Keterangan')
                            ->required(fn (Get $get) => in_array($get('action_type'), ['rejected', 'revised']))
                            ->visible(fn (Get $get) => filled($get('action_type'))),
                    ])
                    ->action(function ($record, array $data) {
                        $type = $data['action_type'];
                        if ($type === 'approve') {
                            $record->update([
                                'app_status' => 'approved',
                                'app_name'   => Auth::user()->name,
                                'app_date'   => now(),
                                'status'     => 'on-process',
                            ]);
                            Notification::make()->title('Berhasil di-approve oleh Finance')->success()->send();
                        } elseif ($type === 'rejected') {
                            $record->update([
                                'app_status' => 'rejected',
                                'status'     => 'rejected',
                                'app_name'   => Auth::user()->name,
                                'app_date'   => now(),
                                'app_keterangan' => $data['app_keterangan'] ?? null,
                            ]);
                            Notification::make()->title('Reimbust ditolak')->danger()->send();
                        } elseif ($type === 'revised') {
                            $record->update([
                                'app_status' => 'revised',
                                'status'     => 'revised',
                                'app_name'   => Auth::user()->name,
                                'app_date'   => now(),
                                'app_keterangan' => $data['app_keterangan'] ?? null,
                            ]);
                            Notification::make()->title('Reimbust direvisi')->warning()->send();
                        }
                    });
            }
            
            if($userRole === 'Finance' ) {
                $actions[] = Action::make('payment_status')
                    ->label('Payment')
                    ->color('primary')
                    ->icon('heroicon-o-wallet')
                    ->visible(fn ($record) => $record->app_status === 'approved'  && $record->app2_status === 'approved')
                    ->form([
                        Select::make('payment_status')
                            ->label('Status Payment')
                            ->options([
                                'unpaid' => 'Unpaid',
                                'paid' => 'Paid'
                            ])
                            ->required()
                            ->reactive(),
                        DatePicker::make('tgl_pembayaran')
                            ->native(false)
                            ->required(fn (Get $get) => $get('paid'))
                            ->visible(fn (Get $get) => filled($get ('payment_status')))
                            ,
                        FileUpload::make('attachment')
                            ->required(fn (Get $get) => in_array($get('payment_status'), ['paid']))
                            ->visible(fn (Get $get) => filled($get ('payment_status')))
                    ])
                    ->action(function ($record, array $data){
                        $type = $data['payment_status'];
                        if($type === 'paid') {
                                $record->update([
                                    'payment_status' => $type,
                                    'tgl_pembayaran' => ($type === 'paid') ? ($data['tgl_pembayaran'] ?? now()) : null,
                                    'attachment' => ($type === 'paid') ? ($data['attachment'] ?? null) : null
                                ]);

                                Notification::make()
                                    ->title('Data pembayaran berhasil diperbarui')
                                    ->success()
                                    ->send(); 
                                }
                            });
            }

            // Tombol APPROVAL UNTUK MANAGER / DIREKSI (Tier 2)
            if ($userRole === 'Manager' || $userRole === 'Direksi' || $userRole === 'Super Admin') {
                $actions[] = Action::make('action_manager')
                    ->label('Approval')
                    ->color('primary')
                    ->icon('heroicon-o-check-badge')
                    ->visible(fn ($record) => $record->app_status === 'approved' && $record->app2_status === 'waiting')
                    ->form([
                        Select::make('action_type')
                            ->label('Tujuan Aksi')
                            ->options([
                                'approve' => 'Approve',
                                'rejected' => 'Rejected',
                                'revised' => 'Revise',
                            ])
                            ->required()
                            ->reactive(),
                        Textarea::make('app2_keterangan')
                            ->label('Keterangan')
                            ->required(fn (Get $get) => in_array($get('action_type'), ['rejected', 'revised']))
                            ->visible(fn (Get $get) => filled($get('action_type'))),
                    ])
                    ->action(function ($record, array $data) {
                        $type = $data['action_type'];
                        if ($type === 'approve') {
                            $record->update([
                                'app2_status' => 'approved',
                                'app2_name'   => Auth::user()->name,
                                'app2_date'   => now(),
                                'status'      => 'approved',
                            ]);
                            Notification::make()->title('Berhasil di-approve')->success()->send();
                        } elseif ($type === 'rejected') {
                            $record->update([
                                'app2_status' => 'rejected',
                                'status'      => 'rejected',
                                'app2_name'   => Auth::user()->name,
                                'app2_date'   => now(),
                                'app2_keterangan' => $data['app2_keterangan'] ?? null,
                            ]);
                            Notification::make()->title('Reimbust ditolak')->danger()->send();
                        } elseif ($type === 'revised') {
                            $record->update([
                                'app2_status' => 'revised',
                                'status'      => 'revised',
                                'app2_name'   => Auth::user()->name,
                                'app2_date'   => now(),
                                'app2_keterangan' => $data['app2_keterangan'] ?? null,
                            ]);
                            Notification::make()->title('Reimbust direvisi')->warning()->send();
                        }
                    });
            }

            return $actions;
        }
}
