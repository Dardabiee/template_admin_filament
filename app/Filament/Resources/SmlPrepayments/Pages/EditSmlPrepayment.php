<?php

namespace App\Filament\Resources\SmlPrepayments\Pages;

use App\Filament\Resources\SmlPrepayments\SmlPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSmlPrepayment extends EditRecord
{
    protected static string $resource = SmlPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
