<?php

namespace App\Filament\Resources\PuCustomers\Pages;

use App\Filament\Resources\PuCustomers\PuCustomerResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuCustomer extends EditRecord
{
    protected static string $resource = PuCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
