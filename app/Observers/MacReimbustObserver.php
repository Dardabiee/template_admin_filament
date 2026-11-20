<?php

namespace App\Observers;

use App\Models\MacReimbust;
use App\Models\User;
use App\Notifications\NewApprovalNotification;
use Illuminate\Support\Facades\Notification;

class MacReimbustObserver
{
    /**
     * Handle the MacReimbust "created" event.
     */
    public function created(MacReimbust $macReimbust): void
    {
        // Kirim notifikasi ke user dengan role Finance atau Super Admin
        $financeUsers = User::role(['Finance', 'Super Admin'])->get();

        if ($financeUsers->isNotEmpty()) {
            Notification::send($financeUsers, new NewApprovalNotification([
                'title' => 'Pengajuan Reimbust MAC Baru',
                'message' => 'Ada pengajuan Reimbust baru dengan ID #' . $macReimbust->id . ' yang memerlukan approval.',
                'url' => url('/admin/mac-reimbusts/' . $macReimbust->id),
            ]));
        }
    }

    /**
     * Handle the MacReimbust "updated" event.
     */
    public function updated(MacReimbust $macReimbust): void
    {
        //
    }

    /**
     * Handle the MacReimbust "deleted" event.
     */
    public function deleted(MacReimbust $macReimbust): void
    {
        //
    }

    /**
     * Handle the MacReimbust "restored" event.
     */
    public function restored(MacReimbust $macReimbust): void
    {
        //
    }

    /**
     * Handle the MacReimbust "force deleted" event.
     */
    public function forceDeleted(MacReimbust $macReimbust): void
    {
        //
    }
}
