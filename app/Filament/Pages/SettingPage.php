<?php

namespace App\Filament\Pages;

use App\Models\SettingPage as SettingPageModel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class SettingPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Pengaturan Halaman';

    protected static ?string $title = 'Pengaturan Halaman';
    
    protected static ?string $navigationGroup = 'Pengaturan';

    protected static string $view = 'filament.pages.setting-page';
    
    public ?array $data = [];
    
    public ?SettingPageModel $record = null;
    
    public function mount(): void
    {
        $this->record = SettingPageModel::getInstance();
        
        $this->form->fill([
            'title_statistic' => $this->record->title_statistic,
            'subtitle_statistic' => $this->record->subtitle_statistic,
            'image_statistic' => $this->record->image_statistic,
            'title_collection' => $this->record->title_collection,
            'subtitle_collection' => $this->record->subtitle_collection,
            'image_collection' => $this->record->image_collection,
            'title_gallery' => $this->record->title_gallery,
            'subtitle_gallery' => $this->record->subtitle_gallery,
            'image_gallery' => $this->record->image_gallery,
            'title_info' => $this->record->title_info,
            'subtitle_info' => $this->record->subtitle_info,
            'image_info' => $this->record->image_info,
            'banner' => $this->record->banner,
        ]);
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan Statistik')
                    ->schema([
                        Forms\Components\TextInput::make('title_statistic')
                            ->label('Judul Statistik')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle_statistic')
                            ->label('Sub Judul Statistik')
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image_statistic')
                            ->label('Gambar Statistik')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imagePreviewHeight('200')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                    
                Forms\Components\Section::make('Pengaturan Koleksi')
                    ->schema([
                        Forms\Components\TextInput::make('title_collection')
                            ->label('Judul Koleksi')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle_collection')
                            ->label('Sub Judul Koleksi')
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image_collection')
                            ->label('Gambar Koleksi')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imagePreviewHeight('200')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                    
                Forms\Components\Section::make('Pengaturan Galeri')
                    ->schema([
                        Forms\Components\TextInput::make('title_gallery')
                            ->label('Judul Galeri')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle_gallery')
                            ->label('Sub Judul Galeri')
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image_gallery')
                            ->label('Gambar Galeri')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imagePreviewHeight('200')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                    
                Forms\Components\Section::make('Pengaturan Informasi')
                    ->schema([
                        Forms\Components\TextInput::make('title_info')
                            ->label('Judul Informasi')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('subtitle_info')
                            ->label('Sub Judul Informasi')
                            ->maxLength(255),
                        Forms\Components\FileUpload::make('image_info')
                            ->label('Gambar Informasi')
                            ->image()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imagePreviewHeight('200')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                    
                Forms\Components\Section::make('Banner')
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
                    ]),
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
            ->body('Pengaturan halaman berhasil diperbarui.')
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
