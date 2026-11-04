<?php

namespace App\Filament\Resources\PuSurveys\Pages;

use App\Filament\Resources\PuSurveys\PuSurveyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPuSurvey extends EditRecord
{
    protected static string $resource = PuSurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
