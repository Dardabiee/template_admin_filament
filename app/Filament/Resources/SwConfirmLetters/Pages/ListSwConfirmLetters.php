<?php

namespace App\Filament\Resources\SwConfirmLetters\Pages;

use App\Filament\Resources\SwConfirmLetters\SwConfirmLetterResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSwConfirmLetters extends ListRecords
{
    protected static string $resource = SwConfirmLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
