<?php

namespace App\Filament\Resources\PuAgens\Pages;

use App\Filament\Resources\PuAgens\PuAgenResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuAgen extends EditRecord
{
    protected static string $resource = PuAgenResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
