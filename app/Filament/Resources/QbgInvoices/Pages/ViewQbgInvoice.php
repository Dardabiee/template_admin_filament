<?php

namespace App\Filament\Resources\QbgInvoices\Pages;

use App\Filament\Resources\QbgInvoices\QbgInvoiceResource;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\Auth;

class ViewQbgInvoice extends Page
{
    use InteractsWithRecord;

    protected static string $resource = QbgInvoiceResource::class;

    protected string $view = 'filament.pages.view-qbg-invoice';

    protected function getHeaderActions(): array
    {
                $user = Auth::user();
                $userName = $user->name;
                $userRole = $user->getRoleNames()->first();

                $actions = [];

                // Tombol APPROVAL UNTUK FINANCE (Tier 1)
                // if ($userRole === 'Finance' || $userRole === 'Super Admin') {
                //     $actions[] = Action::make('action_finance')
                //         ->label('Proses Approval')
                //         ->color('primary')
                //         ->icon('heroicon-o-check-badge')
                //         ->visible(fn ($record) => $record->app_status === 'waiting')
                //         ->form([
                //             Select::make('action_type')
                //                 ->label('Tujuan Aksi')
                //                 ->options([
                //                     'approve' => 'Approve',
                //                     'rejected' => 'Rejected',
                //                     'revised' => 'Revise',
                //                 ])
                //                 ->required()
                //                 ->reactive(),
                //             Textarea::make('app_keterangan')
                //                 ->label('Keterangan')
                //                 ->required(fn (Get $get) => in_array($get('action_type'), ['rejected', 'revised']))
                //                 ->visible(fn (Get $get) => filled($get('action_type'))),
                //         ])
                //         ->action(function ($record, array $data) {
                //             $type = $data['action_type'];
                //             if ($type === 'approve') {
                //                 $record->update([
                //                     'app_status' => 'approved',
                //                     'app_name'   => Auth::user()->name,
                //                     'app_date'   => now(),
                //                     'status'     => 'on-process',
                //                 ]);
                //                 Notification::make()->title('Berhasil di-approve oleh Finance')->success()->send();
                //             } elseif ($type === 'rejected') {
                //                 $record->update([
                //                     'app_status' => 'rejected',
                //                     'status'     => 'rejected',
                //                     'app_name'   => Auth::user()->name,
                //                     'app_date'   => now(),
                //                     'app_keterangan' => $data['app_keterangan'] ?? null,
                //                 ]);
                //                 Notification::make()->title('Prepayment ditolak')->danger()->send();
                //             } elseif ($type === 'revised') {
                //                 $record->update([
                //                     'app_status' => 'revised',
                //                     'status'     => 'revised',
                //                     'app_name'   => Auth::user()->name,
                //                     'app_date'   => now(),
                //                     'app_keterangan' => $data['app_keterangan'] ?? null,
                //                 ]);
                //                 Notification::make()->title('Prepayment direvisi')->warning()->send();
                //             }
                //         });
                // }

                if ($userRole === 'Finance') {
        $actions[] = Action::make('payment_status')
            ->label('Payment')
            ->color('primary')
            ->icon('heroicon-o-wallet')
            ->visible(fn ($record) => in_array($record->payment_status, ['unpaid', null, '']))
            ->form([
                Select::make('payment_status')
                    ->label('Status Payment')
                    ->options([
                        'unpaid' => 'Unpaid',
                        'paid' => 'Paid'
                    ])
                    ->required()
                    ->reactive(), // Wajib ada reactive agar state-nya terpantau oleh field lain
                    
                // DatePicker::make('tgl_pembayaran')
                //     ->native(false)
                //     ->required(fn (Get $get) => $get('payment_status') === 'paid')
                //     ->visible(fn (Get $get) => filled($get('payment_status'))), // Perbaiki typo 'filed' menjadi 'filled' dan ganti ke 'payment_status'
                    
                // FileUpload::make('attachment')
                //     ->required(fn (Get $get) => $get('payment_status') === 'paid')
                //     ->visible(fn (Get $get) => filled($get('payment_status'))) // Perbaiki typo 'filed' menjadi 'filled' dan ganti ke 'payment_status'
            ])
            ->action(function ($record, array $data) {
                $status = $data['payment_status'];
                
                // Simpan data sesuai inputan user
                $record->update([
                    'payment_status' => $status,
                    
                ]);

                Notification::make()
                    ->title('Data pembayaran berhasil diperbarui')
                    ->success()
                    ->send();
            });
    }
                return $actions;
    }
    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    protected function getViewData(): array
    {
        return [
            'invoice' => $this->record,
        ];
    }
}
