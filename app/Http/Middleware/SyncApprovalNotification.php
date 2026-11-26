<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;

class SyncApprovalNotification
{
    /** Daftar command notif. Tambah di sini kalau ada sub bisnis baru. */
    protected array $commands = [
        'notify:mac-reimbust',
        'notify:mac-prepayment',
        'notify:mac-deklarasi',
        'notify:pu-deklarasi',
        'notify:pu-reimbust',
        'notify:pu-prepayment',
        'notify:hm-deklarasi',
        'notify:hm-reimbust',
        'notify:hm-prepayment',
        'notify:qbg-deklarasi',
        'notify:qbg-reimbust',
        'notify:qbg-prepayment',
        'notify:bmn-deklarasi',
        'notify:bmn-reimbust',
        'notify:bmn-prepayment',
        'notify:ctz-deklarasi',
        'notify:ctz-reimbust',
        'notify:ctz-prepayment',
        'notify:kps-deklarasi',
        'notify:kps-reimbust',
        'notify:kps-prepayment',
        'notify:sw-deklarasi',
        'notify:sw-reimbust',
        'notify:sw-prepayment',
        'notify:swi-deklarasi',
        'notify:swi-reimbust',
        'notify:swi-prepayment',
        'notify:sml-deklarasi',
        'notify:sml-reimbust',
        'notify:sml-prepayment',
    ];

    public function handle(Request $request, Closure $next)
    {
        // Hanya saat halaman dimuat penuh (bukan request Livewire/AJAX)
        $isPageLoad = $request->isMethod('GET')
            && ! $request->header('X-Livewire')
            && ! $request->expectsJson();

        // Cache::add hanya berhasil kalau kuncinya belum ada, jadi maksimal 1x per 30 detik
        if ($isPageLoad && Cache::add('approval-notif-sync', true, now()->addSeconds(30))) {
            foreach ($this->commands as $command) {
                try {
                    Artisan::call($command);
                } catch (\Throwable $e) {
                    report($e);   // dicatat di log, halaman tetap jalan
                }
            }
        }

        return $next($request);
    }
}