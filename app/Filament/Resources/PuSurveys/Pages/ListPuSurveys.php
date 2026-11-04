<?php

namespace App\Filament\Resources\PuSurveys\Pages;

use App\Filament\Resources\PuSurveys\PuSurveyResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPuSurveys extends ListRecords
{
    protected static string $resource = PuSurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
