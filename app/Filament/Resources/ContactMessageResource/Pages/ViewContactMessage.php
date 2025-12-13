<?php

namespace App\Filament\Resources\ContactMessageResource\Pages;

use App\Filament\Resources\ContactMessageResource;
use App\Models\ContactMessage;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewContactMessage extends ViewRecord
{
    protected static string $resource = ContactMessageResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('markAsRead')
                ->label('Tandai Dibaca')
                ->icon('heroicon-o-eye')
                ->color('success')
                ->action(function () {
                    $this->record->markAsRead();
                    $this->refreshFormData(['is_read']);
                })
                ->visible(fn (): bool => !$this->record->is_read),
            Actions\EditAction::make()
                ->label('Edit'),
        ];
    }
    
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Auto-mark as read when viewing
        if (!$this->record->is_read) {
            $this->record->markAsRead();
        }
        
        return $data;
    }
}