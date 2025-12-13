<?php

namespace App\Filament\Resources\ServiceHourResource\Pages;

use App\Filament\Resources\ServiceHourResource;
use App\Filament\Widgets\DynamicPageSettingWidget;
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

    protected function getHeaderWidgets(): array
    {
        return [
            DynamicPageSettingWidget::make([
                'forRoute' => 'layanan.jam-layanan'
            ])
        ];
    }
}
