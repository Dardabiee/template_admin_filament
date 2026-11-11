<?php

namespace App\Filament\Resources\BmnSurveys\Pages;

use App\Filament\Resources\BmnSurveys\BmnSurveyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListBmnSurveys extends ListRecords
{
    protected static string $resource = BmnSurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
