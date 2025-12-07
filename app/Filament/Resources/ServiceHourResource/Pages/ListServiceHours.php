<?php

namespace App\Filament\Resources\ServiceHourResource\Pages;

use App\Filament\Resources\ServiceHourResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceHours extends ListRecords
{
    protected static string $resource = ServiceHourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
