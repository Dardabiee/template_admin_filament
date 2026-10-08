<?php

namespace App\Filament\Resources\KpsReimbusts\Pages;

use App\Filament\Resources\KpsReimbusts\KpsReimbustResource;
use App\Models\KpsReimbust;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewKpsReimbust extends ViewRecord
{
    protected static string $resource = KpsReimbustResource::class;

    protected string $view = 'filament.pages.view-kps-reimbust';

    protected function getHeaderActions(): array
    {
        return [
            Action::make('approve')
                ->label('Approve Pengajuan')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                // Tombol hanya muncul jika statusnya masih on-process
                ->visible(fn (KpsReimbust $record) => $record->status === 'on-process')
                ->requiresConfirmation()
                ->modalHeading('Konfirmasi Approval')
                ->modalDescription('Apakah Anda yakin ingin menyetujui pengajuan reimburse ini dari panel holding?')
                ->modalSubmitActionLabel('Ya, Approve')
                ->action(function (KpsReimbust $record) {
                    // Proses update status (PUT) ke database sw
                    $record->update([
                        'status' => 'approved',
                        'app_status' => 'approved',
                        'app2_status' => 'approved',
                        // Jika ada tanggal approval holding, bisa disesuaikan di sini
                    ]);

                    Notification::make()
                        ->title('Pengajuan Reimburse berhasil disetujui!')
                        ->success()
                        ->send();
                }),
        ];
    }
}
