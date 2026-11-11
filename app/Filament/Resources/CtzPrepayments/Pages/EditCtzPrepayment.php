<?php

namespace App\Filament\Resources\CtzPrepayments\Pages;

use App\Filament\Resources\CtzPrepayments\CtzPrepaymentResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCtzPrepayment extends EditRecord
{
    protected static string $resource = CtzPrepaymentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
