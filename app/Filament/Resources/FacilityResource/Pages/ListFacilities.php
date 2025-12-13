<?php

namespace App\Filament\Resources\FacilityResource\Pages;

use App\Filament\Resources\FacilityResource;
use App\Filament\Widgets\DynamicPageSettingWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFacilities extends ListRecords
{
    protected static string $resource = FacilityResource::class;

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
                'forRoute' => 'layanan.fasilitas'
            ])
        ];
    }
}
