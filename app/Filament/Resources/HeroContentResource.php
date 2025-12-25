<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroContentResource\Pages;
use App\Filament\Resources\HeroContentResource\RelationManagers;
use App\Models\HeroContent;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroContentResource extends Resource
{
    protected static ?string $model = HeroContent::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Hero Content';
    
    protected static ?string $navigationGroup = 'Konten Website';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Hero Content')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label('Nama Kategori')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->label('Deskripsi')
                                    ->rows(3),
                            ]),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true)
                            ->inline(false),
                    ]),
                Forms\Components\Section::make('Media Hero Content')
                    ->schema([
                        Forms\Components\Toggle::make('is_video')
                            ->default(false)
                            ->inline(false)
                            ->label('Apakah video?')
                            ->live(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Hero Content')
                            ->required(fn (Forms\Get $get) => ! $get('is_video'))
                            ->visible(fn (Forms\Get $get) => ! $get('is_video'))
                            ->image()
                            ->maxSize(2048)
                            ->directory('hero-contents/images')
                            ->disk('public'),
                        Forms\Components\TextInput::make('youtube_link')
                            ->label('Link YouTube')
                            ->required(fn (Forms\Get $get) => $get('is_video'))
                            ->visible(fn (Forms\Get $get) => $get('is_video'))
                            ->url()
                            ->maxLength(255),
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
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable()
                    ->badge(),
                Tables\Columns\ViewColumn::make('media')
                    ->label('Media')
                    ->view('filament.tables.columns.hero-content-media'),
                Tables\Columns\IconColumn::make('is_video')
                    ->label('Tipe')
                    ->boolean()
                    ->trueIcon('heroicon-o-video-camera')
                    ->falseIcon('heroicon-o-photo')
                    ->trueColor('success')
                    ->falseColor('info'),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Dibuat Oleh')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
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
            'index' => Pages\ListHeroContents::route('/'),
            'create' => Pages\CreateHeroContent::route('/create'),
            'edit' => Pages\EditHeroContent::route('/{record}/edit'),
        ];
    }
}
