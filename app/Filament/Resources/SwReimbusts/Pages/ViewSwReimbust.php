<?php

namespace App\Filament\Resources\SwReimbusts\Pages;

use App\Filament\Resources\SwReimbusts\SwReimbustResource;
use App\Services\SubBusinessDocumentService;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ViewSwReimbust extends ViewRecord
{
    protected static string $resource = SwReimbustResource::class;

    protected string $view = 'filament.pages.view-sw-reimbust';

    public function mount(int|string $record): void
    {
        parent::mount($record);
    }

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
                                'app_date'   => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                                'status'     => 'on-process',
                            ]);
                            Notification::make()->title('Berhasil di-approve oleh Finance')->success()->send();
                        } elseif ($type === 'rejected') {
                            $record->update([
                                'app_status' => 'rejected',
                                'status'     => 'rejected',
                                'app_name'   => Auth::user()->name,
                                'app_date'   => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                                'app_keterangan' => $data['app_keterangan'] ?? null,
                            ]);
                            Notification::make()->title('Reimbust ditolak')->danger()->send();
                        } elseif ($type === 'revised') {
                            $record->update([
                                'app_status' => 'revised',
                                'status'     => 'revised',
                                'app_name'   => Auth::user()->name,
                                'app_date'   => Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s'),
                                'app_keterangan' => $data['app_keterangan'] ?? null,
                            ]);
                            Notification::make()->title('Reimbust direvisi')->warning()->send();
                        }
                    });
            }
            
            if ($userRole === 'Finance') {
                $actions[] = Action::make('payment_status')
                    ->label('Payment')
                    ->color('primary')
                    ->icon('heroicon-o-wallet')
                    ->visible(fn ($record) => $record->app_status === 'approved' && $record->app2_status === 'approved')
                    ->fillForm(fn ($record) => [
                        'payment_status' => $record->payment_status ?? 'unpaid',
                        'tgl_pembayaran' => $record->tgl_pembayaran ? date('Y-m-d', strtotime($record->tgl_pembayaran)) : now()->format('Y-m-d'),
                    ])
                    ->form([
                        Select::make('payment_status')
                            ->label('Status Payment')
                            ->options([
                                'unpaid' => 'Unpaid',
                                'paid'   => 'Paid',
                            ])
                            ->required()
                            ->live(),

                        DatePicker::make('tgl_pembayaran')
                            ->label('Tanggal Pembayaran')
                            ->native(false)
                            ->displayFormat('d-m-Y')
                            ->format('Y-m-d')
                            ->required(fn (Get $get) => $get('payment_status') === 'paid')
                            ->visible(fn (Get $get) => $get('payment_status') === 'paid'),

                        FileUpload::make('attachment')
                            ->label('Bukti Pembayaran (JPG, PNG, PDF - Maks 3MB)')
                            ->disk('local')
                            ->directory('temp-payments')
                            ->acceptedFileTypes(['image/jpeg', 'image/jpg', 'image/png', 'application/pdf'])
                            ->maxSize(3072) // 3 MB sesuai batas CI3
                            ->required(fn (Get $get, $record) => $get('payment_status') === 'paid' && empty($record->attachment))
                            ->visible(fn (Get $get) => $get('payment_status') === 'paid'),
                    ])
                    ->action(function ($record, array $data, SubBusinessDocumentService $docService) {
                        // Sesuaikan pengambilan kode tenant dari $record (misal: $record->tenant_code)
                        $tenant = $record->tenant_code ?? 'sw';
                        $status = $data['payment_status'];

                        if ($status === 'paid') {
                            // Jika Finance mengunggah file baru
                            if (!empty($data['attachment'])) {
                                $tempPath = Storage::disk('local')->path($data['attachment']);

                                try {
                                    $uploadedFile = new UploadedFile(
                                        $tempPath,
                                        basename($tempPath),
                                        mime_content_type($tempPath),
                                        null,
                                        true
                                    );

                                    $docService->uploadPaymentEvidence(
                                        tenant: $tenant,
                                        transactionId: $record->id,
                                        file: $uploadedFile,
                                        paymentDate: $data['tgl_pembayaran']
                                    );
                                } finally {
                                    Storage::disk('local')->delete($data['attachment']);
                                }
                            } else {
                                // Jika status diubah/dipertahankan 'paid' dan tanggal diubah tanpa mengganti file lama
                                $record->update([
                                    'payment_status' => 'paid',
                                    'tgl_pembayaran' => $data['tgl_pembayaran'] . ' ' . now()->format('H:i:s'),
                                ]);
                            }

                            Notification::make()
                                ->title('Data pembayaran berhasil diperbarui')
                                ->success()
                                ->send();
                        } else {
                            // Jika status diubah menjadi 'unpaid', hapus file attachment di folder CI3 (identik dengan logika CI3)
                            $docService->clearPaymentEvidence($tenant, $record->id);

                            Notification::make()
                                ->title('Status pembayaran diubah menjadi Unpaid')
                                ->warning()
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
