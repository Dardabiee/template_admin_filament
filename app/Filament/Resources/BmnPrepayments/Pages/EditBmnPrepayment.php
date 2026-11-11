<?php

namespace App\Filament\Resources\BmnPrepayments\Pages;

use App\Filament\Resources\BmnPrepayments\BmnPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBmnPrepayment extends EditRecord
{
    protected static string $resource = BmnPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
