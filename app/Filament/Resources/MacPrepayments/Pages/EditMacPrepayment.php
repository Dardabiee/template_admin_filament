<?php

namespace App\Filament\Resources\MacPrepayments\Pages;

use App\Filament\Resources\MacPrepayments\MacPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMacPrepayment extends EditRecord
{
    protected static string $resource = MacPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
