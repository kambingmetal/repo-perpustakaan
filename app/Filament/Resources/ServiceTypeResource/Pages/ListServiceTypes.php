<?php

namespace App\Filament\Resources\ServiceTypeResource\Pages;

use App\Filament\Resources\ServiceTypeResource;
use App\Filament\Widgets\DynamicPageSettingWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServiceTypes extends ListRecords
{
    protected static string $resource = ServiceTypeResource::class;

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
                'forRoute' => 'layanan.jenis-layanan'
            ])
        ];
    }
}
