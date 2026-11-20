<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Schedule::command('notify:mac-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:mac-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:mac-deklarasi')->everyMinute()->withoutOverlapping();

