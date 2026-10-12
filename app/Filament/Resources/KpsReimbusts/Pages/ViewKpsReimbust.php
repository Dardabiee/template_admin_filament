<?php

namespace App\Filament\Resources\KpsReimbusts\Pages;

use App\Filament\Resources\KpsReimbusts\KpsReimbustResource;
use App\Models\KpsReimbust;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
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
                $actions[] = Action::make('approve_finance')
                    ->label('Approve')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    // Muncul jika app_status masih waiting
                    ->visible(fn ($record) => $record->app_status === 'waiting')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'app_status' => 'approved',
                            'app_name'   => Auth::user()->name,
                            'app_date'   => now(),
                            // Jika tier 2 belum ada, status utama bisa tetap on-process sampai direksi approve
                            'status'     => ($record->app2_status === 'approved') ? 'approved' : 'on-process',
                        ]);

                        Notification::make()->title('Berhasil di-approve oleh Finance')->success()->send();
                    });

                    $actions[] = Action::make('rejected_finance')
                    ->label('Rejected')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->visible(fn ($record) => $record->app_status ==='waiting')
                    ->action(function ($record, array $data) {
                        $record->update([
                            'app_status' => 'rejected',
                            'app_name' => Auth::user()->name,
                            'app_date' => now(),
                            'app_keterangan' => $data['app_keterangan']
                        ]);
                        Notification::make()->title('Prepayment ditolak')->danger()->send();
                    });

                    $actions[] = Action::make('revised_finance')
                    ->label('Revise')
                    ->color('warning')
                    ->icon('heroicon-o-arrow-path')
                    ->visible(fn ($record) => $record->app_status ==='waiting')
                    ->form([
                        Textarea::make('app_keterangan')
                            ->label('Alasan Direvisi')
                            ->required()
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'app_status' => 'revised',
                            'status' => 'revised',
                            'app_name' => Auth::user()->name,
                            'app_date' => now(),
                            'app_keterangan' => $data['app_keterangan']
                        ]);
                        Notification::make()->title('Prepayment direvisi')->danger()->send();
                    });

            }

            // Tombol APPROVAL UNTukan MANAGER / DIREKSI (Tier 2)
            if ($userRole === 'Manager' || $userRole === 'Direksi' || $userRole === 'Super Admin') {
                $actions[] = Action::make('approve_manager')
                    ->label('Approve as Manager/Direksi')
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    // Manager HANYA BISA klik approve jika Finance (app_status) sudah 'approved' dan app2 masih 'waiting'
                    ->visible(fn ($record) => $record->app_status === 'approved' && $record->app2_status === 'waiting')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $record->update([
                            'app2_status' => 'approved',
                            'app2_name'   => Auth::user()->name,
                            'app2_date'   => now(),
                            'status'      => 'approved', // Karena tier 1 & 2 sudah approved, status utama jadi approved
                        ]);

                        Notification::make()->title('Berhasil di-approve oleh Manager/Direksi')->success()->send();
                    });

                    $actions[] = Action::make('rejected_finance')
                    ->label('Rejected')
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->visible(fn ($record) => $record->app_status ==='waiting')
                    ->form([
                        Textarea::make('app2_keterangan')
                            ->label('Alasan Ditolak')
                            ->required()
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'app2_status' => 'rejected',
                            'status' => 'rejected',
                            'app2_name' => Auth::user()->name,
                            'app2_date' => now(),
                            'app2_keterangan' => $data['app2_keterangan']
                        ]);
                        Notification::make()->title('Prepayment ditolak')->danger()->send();
                    });

                    $actions[] = Action::make('revised_finance')
                    ->label('Revise')
                    ->color('warning')
                    ->icon('heroicon-o-arrow-path')
                    ->visible(fn ($record) => $record->app2_status ==='waiting')
                    ->form([
                        Textarea::make('app2_keterangan')
                            ->label('Alasan Direvisi')
                            ->required()
                    ])
                    ->action(function ($record, array $data) {
                        $record->update([
                            'app2_status' => 'revised',
                            'status' => 'revised',
                            'app2_name' => Auth::user()->name,
                            'app2_date' => now(),
                            'app2_keterangan' => $data['app2_keterangan']
                        ]);
                        Notification::make()->title('Prepayment direvisi')->danger()->send();
                    });
            }

            return $actions;
        }
}
