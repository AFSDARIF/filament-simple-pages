<?php

namespace Afsdarif\FilamentSimplePages\Resources\SimplePageResource\Pages;

use Afsdarif\FilamentSimplePages\Resources\SimplePageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSimplePages extends ListRecords
{
    protected static string $resource = SimplePageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
