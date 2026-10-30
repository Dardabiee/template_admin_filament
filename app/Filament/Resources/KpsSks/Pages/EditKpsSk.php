<?php

namespace App\Filament\Resources\KpsSks\Pages;

use App\Filament\Resources\KpsSks\KpsSkResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKpsSk extends EditRecord
{
    protected static string $resource = KpsSkResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
