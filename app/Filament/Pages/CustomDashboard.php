<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class CustomDashboard extends Page
{   
    // Tambahkan baris ini untuk mematikan auto-discover sidebar dari Resource ini
    protected static bool $shouldRegisterNavigation = false;


    protected static ?string $title = 'Dashboard';

    protected string $view = 'filament.pages.custom-dashboard';
}
