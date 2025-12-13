<?php

namespace App\Filament\Pages;

use App\Models\ProfileCompany;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;

class ProfileCompanyPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    protected static ?string $navigationLabel = 'Profile Perusahaan';

    protected static ?string $title = 'Profile Perusahaan';
    
    protected static ?string $navigationGroup = 'Pengaturan';

    protected static string $view = 'filament.pages.profile-company-page';
    
    public ?array $data = [];
    
    public ?ProfileCompany $record = null;
    
    public function mount(): void
    {
        $this->record = ProfileCompany::getInstance();
        
        $this->form->fill([
            'title' => $this->record->title,
            'description' => $this->record->description,
            'history' => $this->record->history,
            'vision' => $this->record->vision,
            'mission' => $this->record->mission,
            'image' => $this->record->image,
            'struktur_organisasi' => $this->record->struktur_organisasi,
            'social_media' => $this->record->social_media ?? [],
            'email' => $this->record->email,
            'phone' => $this->record->phone,
            'address' => $this->record->address,
        ]);
    }
    
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Perusahaan')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Perusahaan')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('history')
                            ->label('Sejarah Perusahaan')
                            ->rows(4)
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('address')
                            ->label('Alamat')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
                    
                Forms\Components\Section::make('Visi & Misi')
                    ->schema([
                        Forms\Components\RichEditor::make('vision')
                            ->label('Visi')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('mission')
                            ->label('Misi')
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'underline',
                                'bulletList',
                                'orderedList',
                                'link',
                                'undo',
                                'redo',
                            ])
                            ->columnSpanFull(),
                    ]),
                    
                Forms\Components\Section::make('Informasi Kontak')
                    ->schema([
                        Forms\Components\TextInput::make('email')
                            ->label('Email Perusahaan')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('Nomor Telepon')
                            ->tel()
                            ->maxLength(255),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Social Media')
                    ->schema([
                        Forms\Components\Repeater::make('social_media')
                            ->label('Social Media')
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Platform')
                                    ->placeholder('Facebook, Instagram, Twitter, dll')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('icon')
                                    ->label('Kelas Icon')
                                    ->placeholder('fab fa-facebook-f, fab fa-instagram, dll')
                                    ->helperText('Gunakan kelas Font Awesome')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('url')
                                    ->label('URL Link')
                                    ->url()
                                    ->required()
                                    ->maxLength(500),
                            ])
                            ->columns(3)
                            ->defaultItems(0)
                            ->addActionLabel('Tambah Social Media')
                            ->reorderableWithButtons()
                            ->collapsible(),
                    ]),

                Forms\Components\Section::make('Logo/Gambar Perusahaan')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Logo/Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('company')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->imageEditor()
                            ->imagePreviewHeight('250')
                            ->loadingIndicatorPosition('center')
                            ->panelLayout('integrated')
                            ->removeUploadedFileButtonPosition('right')
                            ->uploadProgressIndicatorPosition('left')
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('struktur_organisasi')
                            ->label('Struktur Organisasi')
                            ->image()
                            ->disk('public')
                            ->directory('company/struktur-organisasi')
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
            ->success()
            ->title('Profile perusahaan berhasil diupdate')
            ->send();
    }
    
    public static function canAccess(): bool
    {
        $user = auth()->user();
        
        if ($user->isSuperAdmin()) {
            return true;
        }
        
        return $user->hasPermission('edit', 'profile-company');
    }
}
