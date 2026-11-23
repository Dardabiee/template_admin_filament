<?php

namespace App\Filament\Resources\HmPrepayments\Pages;

use App\Filament\Resources\HmPrepayments\HmPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHmPrepayment extends EditRecord
{
    protected static string $resource = HmPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
