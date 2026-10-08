<?php

namespace App\Filament\Resources\KpsPrepayments\Pages;

use App\Filament\Resources\KpsPrepayments\KpsPrepaymentResource;
use App\Models\KpsPrepayment;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewKpsPrepayment extends ViewRecord
{
    protected static string $resource = KpsPrepaymentResource::class;

    protected string $view = 'filament.pages.view-kps-prepayment';

    protected function getHeaderActions(): array
    {
        return [
           Action::make('approve')
                ->label('Approve Pengajuan')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                // Tombol hanya muncul jika statusnya masih on-process
                ->visible(fn (KpsPrepayment $record) => $record->status === 'on-process')
                ->requiresConfirmation()
                ->modalHeading('Konfirmasi Approval')
                ->modalDescription('Apakah Anda yakin ingin menyetujui pengajuan prepayment ini dari panel holding?')
                ->modalSubmitActionLabel('Ya, Approve')
                ->action(function (KpsPrepayment $record) {
                    // Proses update status (PUT) ke database sw
                    $record->update([
                        'status' => 'approved',
                        'app_status' => 'approved',
                        'app2_status' => 'approved',
                        // Jika ada tanggal approval holding, bisa disesuaikan di sini
                    ]);

                    Notification::make()
                        ->title('Pengajuan prepayment berhasil disetujui!')
                        ->success()
                        ->send();
                }),
        
        ];
    }
}
