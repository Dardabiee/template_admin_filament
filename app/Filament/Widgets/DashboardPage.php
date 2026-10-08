<?php

namespace App\Filament\Widgets;


use Filament\Pages\Dashboard as BaseDashboard;

class DashboardPage extends BaseDashboard
{
    protected string $view = 'filament.widgets.dashboard-page';

    protected int | string | array $columnSpan = 'full';

//     public function getColumns(): int | array
// {
//     return [
//         'md' => 4,
//         'xl' => 5,
//     ];
// }
}
