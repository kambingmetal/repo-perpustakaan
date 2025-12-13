<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatisticResource\Widgets\DynamicPageSettingWidget;
use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Tim';

    protected static ?string $modelLabel = 'Tim';

    protected static ?string $pluralModelLabel = 'Tim';

    protected static ?string $navigationGroup = 'Konten Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                    
                Forms\Components\TextInput::make('role')
                    ->required()
                    ->maxLength(255)
                    ->label('Role/Jabatan'),
                    
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->label('Urutan')
                    ->helperText('Angka kecil akan tampil lebih dulu'),
                    
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('team-photos')
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '1:1',
                        '4:3',
                        '16:9',
                    ])
                    ->maxSize(2048)
                    ->helperText('Upload foto tim (maksimal 2MB)')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->square()
                    ->size(50),
                    
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->sortable(),
                    
                Tables\Columns\TextColumn::make('role')
                    ->searchable()
                    ->label('Role/Jabatan'),
                    
                Tables\Columns\TextColumn::make('order')
                    ->sortable()
                    ->label('Urutan'),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Dibuat'),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Diperbarui'),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
