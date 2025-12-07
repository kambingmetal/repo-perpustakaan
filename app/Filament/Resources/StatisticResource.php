<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatisticResource\Pages;
use App\Filament\Resources\StatisticResource\RelationManagers;
use App\Filament\Resources\StatisticResource\Widgets;
use App\Models\Statistic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class StatisticResource extends Resource
{
    protected static ?string $model = Statistic::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    
    protected static ?string $navigationLabel = 'Statistik';
    
    protected static ?string $modelLabel = 'Statistik';
    
    protected static ?string $pluralModelLabel = 'Statistik';
    
    protected static ?string $navigationGroup = 'Konten Website';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Statistik')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Statistik')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Total Buku'),
                        Forms\Components\TextInput::make('value')
                            ->label('Nilai')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->placeholder('Contoh: 1000'),
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon (Class CSS)')
                            ->maxLength(255)
                            ->placeholder('Contoh: heroicon-o-book-open')
                            // add helper text with link to heroicons and fontawesome
                            ->helperText(new HtmlString('Gunakan class icon dari <a href="https://heroicons.com/" target="_blank" class="underline">Heroicons</a> atau <a href="https://fontawesome.com/icons" target="_blank" class="underline">FontAwesome</a>.')),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Statistik')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->label('Nilai')
                    ->numeric()
                    ->sortable()
                    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.')),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getWidgets(): array
    {
        return [
            Widgets\StatisticSettingWidget::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatistics::route('/'),
            'create' => Pages\CreateStatistic::route('/create'),
            'edit' => Pages\EditStatistic::route('/{record}/edit'),
        ];
    }
}
