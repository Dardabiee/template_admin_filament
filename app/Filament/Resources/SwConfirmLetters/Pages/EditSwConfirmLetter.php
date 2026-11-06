<?php

namespace App\Filament\Resources\SwConfirmLetters\Pages;

use App\Filament\Resources\SwConfirmLetters\SwConfirmLetterResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSwConfirmLetter extends EditRecord
{
    protected static string $resource = SwConfirmLetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
