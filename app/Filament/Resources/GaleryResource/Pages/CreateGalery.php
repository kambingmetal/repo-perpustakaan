<?php

namespace App\Filament\Resources\GaleryResource\Pages;

use App\Filament\Resources\GaleryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGalery extends CreateRecord
{
    protected static string $resource = GaleryResource::class;

    protected static ?string $title = 'Tambah Galeri';
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
