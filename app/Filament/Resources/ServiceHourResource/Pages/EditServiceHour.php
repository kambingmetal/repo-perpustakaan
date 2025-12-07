<?php

namespace App\Filament\Resources\ServiceHourResource\Pages;

use App\Filament\Resources\ServiceHourResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditServiceHour extends EditRecord
{
    protected static string $resource = ServiceHourResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Jika tutup, set default jam menjadi 00:00:00
        if (isset($data['is_closed']) && $data['is_closed'] === true) {
            $data['open_time'] = '00:00:00';
            $data['close_time'] = '00:00:00';
        }

        return $data;
    }
}
