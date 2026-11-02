<?php

namespace App\Filament\Resources\PuCustomers\Pages;

use App\Filament\Resources\PuCustomers\PuCustomerResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuCustomers extends ListRecords
{
    protected static string $resource = PuCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
