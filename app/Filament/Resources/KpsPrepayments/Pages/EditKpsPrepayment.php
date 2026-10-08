<?php

namespace App\Filament\Resources\KpsPrepayments\Pages;

use App\Filament\Resources\KpsPrepayments\KpsPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKpsPrepayment extends EditRecord
{
    protected static string $resource = KpsPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
