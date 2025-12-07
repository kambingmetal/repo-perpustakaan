<?php

namespace App\Filament\Resources\StatisticResource\Pages;

use App\Filament\Resources\StatisticResource;
use App\Filament\Resources\StatisticResource\Widgets\StatisticSettingWidget;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatistics extends ListRecords
{
    protected static string $resource = StatisticResource::class;
    
    protected static ?string $title = 'Statistik';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Statistik'),
        ];
    }
    
    protected function getHeaderWidgets(): array
    {
        return [
            StatisticSettingWidget::class,
        ];
    }
}
