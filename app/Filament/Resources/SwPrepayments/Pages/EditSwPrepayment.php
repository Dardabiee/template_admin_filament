<?php

namespace App\Filament\Resources\SwPrepayments\Pages;

use App\Filament\Resources\SwPrepayments\SwPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwPrepayment extends EditRecord
{
    protected static string $resource = SwPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
