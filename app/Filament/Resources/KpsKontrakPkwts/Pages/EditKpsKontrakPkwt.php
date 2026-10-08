<?php

namespace App\Filament\Resources\KpsKontrakPkwts\Pages;

use App\Filament\Resources\KpsKontrakPkwts\KpsKontrakPkwtResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditKpsKontrakPkwt extends EditRecord
{
    protected static string $resource = KpsKontrakPkwtResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
