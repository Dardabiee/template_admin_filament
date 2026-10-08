<?php

namespace App\Filament\Resources\KpsDeklarasis\Pages;

use App\Filament\Resources\KpsDeklarasis\KpsDeklarasiResource;
use App\Models\KpsDeklarasi;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewKpsDeklarasi extends ViewRecord
{
    protected static string $resource = KpsDeklarasiResource::class;

    protected string $view = 'filament.pages.view-kps-deklarasi';
    protected function getHeaderActions(): array
    {
        return [
            Action::make('approve')
                ->label('Approve Pengajuan')
                ->color('success')
                ->icon('heroicon-o-check-circle')
                // Tombol hanya muncul jika statusnya masih on-process
                ->visible(fn (KpsDeklarasi $record) => $record->status === 'on-process')
                ->requiresConfirmation()
                ->modalHeading('Konfirmasi Approval')
                ->modalDescription('Apakah Anda yakin ingin menyetujui pengajuan deklarasi ini dari panel holding?')
                ->modalSubmitActionLabel('Ya, Approve')
                ->action(function (KpsDeklarasi $record) {
                    // Proses update status (PUT) ke database sw
                    $record->update([
                        'status' => 'approved',
                        'app_status' => 'approved',
                        'app2_status' => 'approved',
                        // Jika ada tanggal approval holding, bisa disesuaikan di sini
                    ]);

                    Notification::make()
                        ->title('Pengajuan deklarasi berhasil disetujui!')
                        ->success()
                        ->send();
                }),
        
        ];
    }
}
