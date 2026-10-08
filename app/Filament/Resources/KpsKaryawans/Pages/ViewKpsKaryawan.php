<?php

namespace App\Filament\Resources\KpsKaryawans\Pages;

use App\Filament\Resources\KpsKaryawans\KpsKaryawanResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewKpsKaryawan extends ViewRecord
{
    protected static string $resource = KpsKaryawanResource::class;

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         EditAction::make(),
    //     ];
    // }
}
