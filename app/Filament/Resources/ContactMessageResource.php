<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Filament\Resources\ContactMessageResource\RelationManagers;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    
    protected static ?string $navigationLabel = 'Pesan Kontak';
    
    protected static ?string $modelLabel = 'Pesan Kontak';
    
    protected static ?string $pluralModelLabel = 'Pesan Kontak';
    
    protected static ?string $navigationGroup = 'Komunikasi';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pengirim')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('phone')
                            ->label('Telepon')
                            ->tel()
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('subject')
                            ->label('Subjek')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                    ])
                    ->columns(2),
                    
                Forms\Components\Section::make('Pesan')
                    ->schema([
                        Forms\Components\Textarea::make('message')
                            ->label('Pesan')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                    ]),
                    
                Forms\Components\Section::make('Status & Informasi Teknis')
                    ->schema([
                        Forms\Components\Toggle::make('is_read')
                            ->label('Sudah Dibaca')
                            ->default(false)
                            ->columnSpan(1),
                        Forms\Components\TextInput::make('ip_address')
                            ->label('IP Address')
                            ->maxLength(255)
                            ->columnSpan(1),
                        Forms\Components\Textarea::make('user_agent')
                            ->label('User Agent')
                            ->rows(2)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight(FontWeight::Medium),
                    
                TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->sortable()
                    ->copyable(),
                    
                TextColumn::make('phone')
                    ->label('Telepon')
                    ->searchable()
                    ->copyable(),
                    
                TextColumn::make('subject')
                    ->label('Subjek')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 50) {
                            return null;
                        }
                        return $state;
                    }),
                    
                TextColumn::make('message')
                    ->label('Pesan')
                    ->limit(100)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 100) {
                            return null;
                        }
                        return $state;
                    }),
                    
                TextColumn::make('is_read')
                    ->label('Status')
                    ->badge()
                    ->color(fn (bool $state): string => $state ? 'success' : 'warning')
                    ->formatStateUsing(fn (bool $state): string => $state ? 'Sudah Dibaca' : 'Belum Dibaca'),
                    
                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('is_read')
                    ->label('Status')
                    ->options([
                        '0' => 'Belum Dibaca',
                        '1' => 'Sudah Dibaca',
                    ])
                    ->default('0'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Lihat'),
                Tables\Actions\Action::make('markAsRead')
                    ->label('Tandai Dibaca')
                    ->icon('heroicon-o-eye')
                    ->color('success')
                    ->action(function (ContactMessage $record) {
                        $record->markAsRead();
                    })
                    ->visible(fn (ContactMessage $record): bool => !$record->is_read),
                Tables\Actions\EditAction::make()
                    ->label('Edit'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\Action::make('markAllAsRead')
                        ->label('Tandai Semua Dibaca')
                        ->icon('heroicon-o-eye')
                        ->color('success')
                        ->action(function ($records) {
                            $records->each(fn (ContactMessage $record) => $record->markAsRead());
                        }),
                    Tables\Actions\DeleteBulkAction::make()
                        ->label('Hapus'),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Informasi Pengirim')
                    ->schema([
                        TextEntry::make('name')
                            ->label('Nama')
                            ->weight(FontWeight::Bold),
                        TextEntry::make('email')
                            ->label('Email')
                            ->copyable(),
                        TextEntry::make('phone')
                            ->label('Telepon')
                            ->copyable(),
                        TextEntry::make('subject')
                            ->label('Subjek')
                            ->weight(FontWeight::Medium),
                    ])
                    ->columns(2),
                    
                Section::make('Pesan')
                    ->schema([
                        TextEntry::make('message')
                            ->label('Pesan')
                            ->prose()
                            ->columnSpanFull(),
                    ]),
                    
                Section::make('Informasi Teknis')
                    ->schema([
                        TextEntry::make('ip_address')
                            ->label('IP Address'),
                        TextEntry::make('user_agent')
                            ->label('User Agent')
                            ->columnSpanFull(),
                        TextEntry::make('created_at')
                            ->label('Tanggal Kirim')
                            ->dateTime('d F Y, H:i:s'),
                        TextEntry::make('is_read')
                            ->label('Status')
                            ->badge()
                            ->color(fn (bool $state): string => $state ? 'success' : 'warning')
                            ->formatStateUsing(fn (bool $state): string => $state ? 'Sudah Dibaca' : 'Belum Dibaca'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
            'create' => Pages\CreateContactMessage::route('/create'),
            'edit' => Pages\EditContactMessage::route('/{record}/edit'),
        ];
    }
    
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::unread()->count() ?: null;
    }
    
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::unread()->count() > 0 ? 'warning' : null;
    }
}
