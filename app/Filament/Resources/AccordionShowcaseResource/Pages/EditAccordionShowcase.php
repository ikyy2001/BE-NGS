<?php

namespace App\Filament\Resources\AccordionShowcaseResource\Pages;

use App\Filament\Resources\AccordionShowcaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAccordionShowcase extends EditRecord
{
    protected static string $resource = AccordionShowcaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
