<?php

namespace App\Filament\Widgets;

use App\Models\SettingPage;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class DynamicPageSettingWidget extends Widget implements HasForms
{
    use InteractsWithForms;
    
    protected static string $view = 'filament.resources.dynamic-page-setting.setting-widget';
    
    public ?array $data = [];
    public ?string $forRoute = null;
    
    public function mount(): void
    {
        $setting = SettingPage::getInstance($this->forRoute, true);
        
        $this->form->fill([
            'banner' => $setting?->banner,
        ]);
    }

    protected int | string | array $columnSpan = 'full';
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan Halaman')
                    ->schema([
                        Forms\Components\FileUpload::make('banner')
                            ->label('Banner Halaman')
                            ->image()
                            ->disk('public')
                            ->directory('banners')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imagePreviewHeight('250')
                            ->loadingIndicatorPosition('center')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadProgressIndicatorPosition('left')
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
            ])
            ->statePath('data');
    }
    
    public function save(): void
    {
        $data = $this->form->getState();
        
        $setting = SettingPage::getInstance($this->forRoute, true);

        if (!empty($setting)) {
            $setting->update($data);
        } else {
            SettingPage::create([
                'for_route' => $this->forRoute,
                ...$data
            ]);
        }

        
        Notification::make()
            ->success()
            ->title('Berhasil disimpan')
            ->send();
    }
}

