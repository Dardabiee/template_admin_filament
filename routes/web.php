<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portal');
});

use Illuminate\Support\Facades\Artisan;

Route::get('/apasih-sokasik-beut', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return 'Selesai: config, cache, view, route sudah di-clear.';
});

Route::post('/notifications/read-all', function () {
    if (auth()->check()) {
        auth()->user()->unreadNotifications->markAsRead();
    }
    return back();
})->name('notifications.readAll')->middleware(['auth']);