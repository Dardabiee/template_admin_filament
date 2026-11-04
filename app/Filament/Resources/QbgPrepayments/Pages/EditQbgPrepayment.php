<?php

namespace App\Filament\Resources\QbgPrepayments\Pages;

use App\Filament\Resources\QbgPrepayments\QbgPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditQbgPrepayment extends EditRecord
{
    protected static string $resource = QbgPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
