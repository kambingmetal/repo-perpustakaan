<?php

namespace App\Filament\Resources\GaleryResource\Pages;

use App\Filament\Resources\GaleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGaleries extends ListRecords
{
    protected static string $resource = GaleryResource::class;

    protected static ?string $title = 'Galeri';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Galeri'),
        ];
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            // StatisticSettingWidget::class,
        ];
    }
}
