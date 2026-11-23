<?php

namespace App\Console\Commands;

use App\Filament\Resources\SwiPrepayments\SwiPrepaymentResource;
use App\Models\SwiPrepayment;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Notifications\DatabaseNotification;
use Filament\Notifications\Notification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NotifySwiPrepayment extends Command
{
    protected $signature = 'notify:swi-prepayment {--baseline : tandai semua data lama sebagai sudah dinotif}';
    protected $description = 'Kirim notifikasi pengajuan prepayment SWI ke approver';

    protected string $approverColumn = 'app_name';

    public function handle(): int
    {
        $keyName = (new SwiPrepayment)->getKeyName();

        $notified = DB::table('notified_submissions')
            ->where('source', 'swi_prepayment')
            ->pluck('source_id');

        $rows = SwiPrepayment::query()
            ->where('app_status', 'waiting')
            ->whereNotIn($keyName, $notified)
            ->get();

        if ($this->option('baseline')) {
            $rows->each(fn ($r) => $this->markNotified($r->getKey()));
            $this->info("Baseline: {$rows->count()} data ditandai.");
            return self::SUCCESS;
        }

        $this->info("Pengajuan waiting yang belum dinotif: {$rows->count()}");

        $sent = 0;

        foreach ($rows as $row) {
            $recipients = $this->recipientsFor($row);

            if ($recipients->isEmpty()) {
                $this->warn("Pengajuan #{$row->getKey()}: approver '{$row->{$this->approverColumn}}' tidak ketemu di tbl_user.");
                continue;
            }

            $message = Notification::make()
                ->title('Pengajuan Prepayment Baru (SWI)')
                ->body("Pengajuan #{$row->getKey()} menunggu approval.")
                ->icon('heroicon-o-banknotes')
                ->iconColor('warning')
                ->actions([
                    Action::make('view')
                        ->label('Lihat')
                        ->button()
                        ->url(SwiPrepaymentResource::getUrl('view', ['record' => $row->getKey()]))
                        ->markAsRead(),
                ])
                ->getDatabaseMessage();

            DB::transaction(function () use ($recipients, $message, $row) {
                foreach ($recipients as $user) {
                    $user->notifications()->create([
                        'id'   => (string) Str::uuid(),
                        'type' => DatabaseNotification::class,
                        'data' => $message,
                    ]);
                }

                $this->markNotified($row->getKey());
            });

            $sent++;
        }

        $this->info("{$sent} pengajuan dinotifikasikan.");

        return self::SUCCESS;
    }

    protected function recipientsFor(SwiPrepayment $row)
    {
        $name = trim((string) $row->{$this->approverColumn});

        if ($name === '') {
            return collect();
        }

        return User::where('name', $name)
            ->where('is_active', 'Y')
            ->get();
    }

    protected function markNotified(int|string $id): void
    {
        DB::table('notified_submissions')->insertOrIgnore([
            'source'     => 'swi_prepayment',
            'source_id'  => $id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
