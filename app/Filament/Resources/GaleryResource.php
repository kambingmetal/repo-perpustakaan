<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleryResource\Pages;
use App\Filament\Resources\GaleryResource\RelationManagers;
use App\Models\Galery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleryResource extends Resource
{
    protected static ?string $model = Galery::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    protected static ?string $navigationLabel = 'Galeri';
    
    protected static ?string $navigationGroup = 'Konten Website';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        // add conditional fields based on is_video value
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Galeri')
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
                ]),
                Forms\Components\Section::make('Media Galeri')
                ->schema([
                    Forms\Components\Toggle::make('is_video')
                        ->default(false)
                        ->inline(false)
                        ->label('Apakah video?')
                        ->live(),
                    Forms\Components\FileUpload::make('image')
                        ->label('Gambar Galeri')
                        ->required(fn (Forms\Get $get) => ! $get('is_video'))
                        ->visible(fn (Forms\Get $get) => ! $get('is_video'))
                        ->image()
                        ->maxSize(2048)
                        ->directory('galeries/images')
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
                    ->view('filament.tables.columns.galery-media'),
                Tables\Columns\IconColumn::make('is_video')
                    ->label('Tipe')
                    ->boolean()
                    ->trueIcon('heroicon-o-video-camera')
                    ->falseIcon('heroicon-o-photo')
                    ->trueColor('success')
                    ->falseColor('info'),
                Tables\Columns\TextColumn::make('creator.name')
                    ->label('Dibuat Oleh')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListGaleries::route('/'),
            'create' => Pages\CreateGalery::route('/create'),
            'edit' => Pages\EditGalery::route('/{record}/edit'),
        ];
    }
}
