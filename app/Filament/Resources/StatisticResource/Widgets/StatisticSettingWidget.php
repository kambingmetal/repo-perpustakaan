<?php

namespace App\Filament\Resources\StatisticResource\Widgets;

use App\Models\SettingPage;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Widgets\Widget;

class StatisticSettingWidget extends Widget implements HasForms
{
    use InteractsWithForms;
    
    protected static string $view = 'filament.resources.statistic-resource.widgets.statistic-setting-widget';
    
    public ?array $data = [];
    
    public function mount(): void
    {
        $setting = SettingPage::getInstance();
        
        $this->form->fill([
            'title_statistic' => $setting->title_statistic,
            'subtitle_statistic' => $setting->subtitle_statistic,
        ]);
    }
    
    public function form(Form $form): Form
    {
        return $form
        // full width form
            ->schema([
                Forms\Components\Section::make('Pengaturan Judul & Subtitle Statistik')
                    ->description('Konfigurasi judul dan subtitle yang akan ditampilkan di halaman website')
                    ->schema([
                        Forms\Components\TextInput::make('title_statistic')
                            ->label('Judul Statistik')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Statistik Perpustakaan'),
                        Forms\Components\TextInput::make('subtitle_statistic')
                            ->label('Subtitle Statistik')
                            ->maxLength(255)
                            ->placeholder('Contoh: Data statistik perpustakaan kami'),
                    ])
                    ->columns(2)
            ])
            ->statePath('data');
    }
    
    public function save(): void
    {
        $data = $this->form->getState();
        
        $setting = SettingPage::getInstance();
        $setting->update([
            'title_statistic' => $data['title_statistic'],
            'subtitle_statistic' => $data['subtitle_statistic'],
            'updated_by' => auth()->id(),
        ]);
        
        Notification::make()
            ->success()
            ->title('Berhasil disimpan')
            ->body('Pengaturan judul dan subtitle statistik telah diperbarui.')
            ->send();
    }
}

