<?php

namespace App\Filament\Resources\BmnSurveys\Pages;

use App\Filament\Resources\BmnSurveys\BmnSurveyResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditBmnSurvey extends EditRecord
{
    protected static string $resource = BmnSurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
