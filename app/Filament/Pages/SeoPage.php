<?php

namespace App\Filament\Pages;

use App\Models\SettingPage as SettingPageModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class SeoPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    protected static ?string $navigationLabel = 'Pengaturan SEO';

    protected static ?string $title = 'Pengaturan SEO';
    
    protected static ?string $navigationGroup = 'Pengaturan';

    protected static string $view = 'filament.pages.seo-page';
    
    public ?array $data = [];
    
    public ?SettingPageModel $record = null;
    
    public function mount(): void
    {
        $this->record = SettingPageModel::getInstance();
        
        $this->form->fill([
            'site_description' => $this->record->site_description,
            'meta_keyword' => $this->record->meta_keyword,
            'meta_description' => $this->record->meta_description,
            'favicon' => $this->record->favicon,
            'og_image' => $this->record->og_image,
        ]);
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan SEO Website')
                    ->description('Atur pengaturan SEO untuk meningkatkan visibilitas website di mesin pencari')
                    ->schema([
                        Forms\Components\Textarea::make('site_description')
                            ->label('Deskripsi Website')
                            ->helperText('Deskripsi singkat tentang website yang akan muncul di hasil pencarian')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),
                            
                        Forms\Components\Textarea::make('meta_keyword')
                            ->label('Meta Keywords')
                            ->helperText('Kata kunci yang dipisahkan dengan koma (contoh: perpustakaan, digital, buku)')
                            ->rows(2)
                            ->maxLength(1000)
                            ->columnSpanFull(),
                            
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->helperText('Deskripsi meta yang muncul di hasil pencarian Google (maksimal 160 karakter)')
                            ->rows(3)
                            ->maxLength(160)
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
                    
                Forms\Components\Section::make('Media SEO')
                    ->description('Upload file untuk meningkatkan branding dan sharing di media sosial')
                    ->schema([
                        Forms\Components\FileUpload::make('favicon')
                            ->label('Favicon')
                            ->helperText('Icon kecil yang muncul di tab browser (format: .ico, .png ukuran 16x16 atau 32x32 pixel)')
                            ->acceptedFileTypes(['image/x-icon', 'image/png', 'image/ico'])
                            ->disk('public')
                            ->directory('seo')
                            ->visibility('public')
                            ->maxSize(1024)
                            ->imagePreviewHeight('50')
                            ->loadingIndicatorPosition('center')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadProgressIndicatorPosition('left')
                            ->columnSpanFull(),
                            
                        Forms\Components\FileUpload::make('og_image')
                            ->label('Open Graph Image')
                            ->helperText('Gambar yang muncul ketika website dibagikan di media sosial (ukuran optimal: 1200x630 pixel)')
                            ->image()
                            ->disk('public')
                            ->directory('seo')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imagePreviewHeight('200')
                            ->loadingIndicatorPosition('center')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadProgressIndicatorPosition('left')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ])
            ->statePath('data');
    }
    
    public function save(): void
    {
        $data = $this->form->getState();
        
        $this->record->fill($data);
        $this->record->updated_by = auth()->id();
        $this->record->save();
        
        Notification::make()
            ->title('Berhasil')
            ->success()
            ->body('Pengaturan SEO berhasil diperbarui.')
            ->send();
    }
    
    protected function getFormActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Simpan Perubahan')
                ->submit('save'),
        ];
    }
}