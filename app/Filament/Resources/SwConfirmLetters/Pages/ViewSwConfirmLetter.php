<?php

namespace App\Filament\Resources\SwConfirmLetters\Pages;

use App\Filament\Resources\SwConfirmLetters\SwConfirmLetterResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewSwConfirmLetter extends ViewRecord
{
    protected static string $resource = SwConfirmLetterResource::class;

    protected string $view = 'filament.pages.view-sw-confirm-letter';

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);
    }

    protected function getHeaderActions(): array
    {
        
    }
}
