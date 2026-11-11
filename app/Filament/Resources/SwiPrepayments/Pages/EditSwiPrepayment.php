<?php

namespace App\Filament\Resources\SwiPrepayments\Pages;

use App\Filament\Resources\SwiPrepayments\SwiPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwiPrepayment extends EditRecord
{
    protected static string $resource = SwiPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
