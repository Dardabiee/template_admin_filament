<?php

namespace App\Filament\Resources\KpsKaryawans\Pages;

use App\Filament\Resources\KpsKaryawans\KpsKaryawanResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditKpsKaryawan extends EditRecord
{
    protected static string $resource = KpsKaryawanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
