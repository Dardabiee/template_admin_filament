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
Schedule::command('notify:hm-reimbuist')->everyMinute()->withoutOverlapping();
Schedule::command('notify:hm-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:hm-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:pu-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:pu-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:pu-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:qbg-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:qbg-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:qbg-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:bmn-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:bmn-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:bmn-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:ctz-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:ctz-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:ctz-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:kps-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:kps-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:kps-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:sw-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:sw-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:sw-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:swi-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:swi-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:swi-prepayment')->everyMinute()->withoutOverlapping();
Schedule::command('notify:sml-deklarasi')->everyMinute()->withoutOverlapping();
Schedule::command('notify:sml-reimbust')->everyMinute()->withoutOverlapping();
Schedule::command('notify:sml-prepayment')->everyMinute()->withoutOverlapping();





