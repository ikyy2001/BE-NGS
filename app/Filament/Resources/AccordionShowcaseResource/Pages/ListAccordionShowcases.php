<?php

namespace App\Filament\Resources\AccordionShowcaseResource\Pages;

use App\Filament\Resources\AccordionShowcaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAccordionShowcases extends ListRecords
{
    protected static string $resource = AccordionShowcaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
