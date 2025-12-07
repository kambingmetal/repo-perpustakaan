<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookResource\Pages;
use App\Models\Book;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

/**
 * CONTOH IMPLEMENTASI PERMISSION SYSTEM
 * 
 * Ini adalah contoh bagaimana menggunakan permission system
 * yang sudah dibuat di resource lain.
 * 
 * Untuk menggunakan resource ini:
 * 1. Buat model Book: php artisan make:model Book -m
 * 2. Buat migration untuk table books dengan field yang sesuai
 * 3. Generate resource: php artisan make:filament-resource Book --generate
 * 4. Copy method canViewAny, canCreate, canEdit, canDelete ke resource Anda
 * 5. Buat permission di menu Hak Akses Admin dengan resource 'books'
 */
class BookResource extends Resource
{
    protected static ?string $model = Book::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    
    protected static ?string $navigationLabel = 'Buku';
    
    protected static ?string $navigationGroup = 'Perpustakaan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Buku')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Buku')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('author')
                            ->label('Penulis')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi')
                            ->rows(3),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author')
                    ->label('Penulis')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBooks::route('/'),
            'create' => Pages\CreateBook::route('/create'),
            'edit' => Pages\EditBook::route('/{record}/edit'),
        ];
    }
    
    /**
     * PERMISSION METHODS
     * Copy method-method berikut ke resource Anda
     * dan sesuaikan nama resource di parameter kedua hasPermission()
     */
    
    /**
     * Cek apakah user dapat melihat daftar resource
     */
    public static function canViewAny(): bool
    {
        $user = auth()->user();
        
        // Super admin dapat melihat semua
        if ($user->isSuperAdmin()) {
            return true;
        }
        
        // Check permission untuk resource 'books'
        return $user->hasPermission('view', 'books');
    }
    
    /**
     * Cek apakah user dapat membuat resource baru
     */
    public static function canCreate(): bool
    {
        $user = auth()->user();
        
        if ($user->isSuperAdmin()) {
            return true;
        }
        
        return $user->hasPermission('create', 'books');
    }
    
    /**
     * Cek apakah user dapat mengedit resource
     */
    public static function canEdit($record): bool
    {
        $user = auth()->user();
        
        if ($user->isSuperAdmin()) {
            return true;
        }
        
        return $user->hasPermission('edit', 'books');
    }
    
    /**
     * Cek apakah user dapat menghapus resource
     */
    public static function canDelete($record): bool
    {
        $user = auth()->user();
        
        if ($user->isSuperAdmin()) {
            return true;
        }
        
        return $user->hasPermission('delete', 'books');
    }
    
    /**
     * Cek apakah user dapat melihat detail resource
     */
    public static function canView($record): bool
    {
        $user = auth()->user();
        
        if ($user->isSuperAdmin()) {
            return true;
        }
        
        return $user->hasPermission('view', 'books');
    }
}
