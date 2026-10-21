<?php

namespace App\Filament\Resources\PuPrepayments\Pages;

use App\Filament\Resources\PuPrepayments\PuPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuPrepayment extends EditRecord
{
    protected static string $resource = PuPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
