<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceHourResource\Pages;
use App\Filament\Resources\ServiceHourResource\RelationManagers;
use App\Models\ServiceHour;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServiceHourResource extends Resource
{
    protected static ?string $model = ServiceHour::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';
    
    protected static ?string $navigationLabel = 'Jam Layanan';
    
    protected static ?string $navigationGroup = 'Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Jam Layanan')
                    ->schema([
                        Forms\Components\Select::make('day')
                            ->label('Hari Mulai')
                            ->options([
                                'Senin' => 'Senin',
                                'Selasa' => 'Selasa',
                                'Rabu' => 'Rabu',
                                'Kamis' => 'Kamis',
                                'Jumat' => 'Jumat',
                                'Sabtu' => 'Sabtu',
                                'Minggu' => 'Minggu',
                            ])
                            ->required()
                            ->searchable(),
                        Forms\Components\Select::make('end_day')
                            ->label('Hari Selesai (Opsional)')
                            ->options([
                                'Senin' => 'Senin',
                                'Selasa' => 'Selasa',
                                'Rabu' => 'Rabu',
                                'Kamis' => 'Kamis',
                                'Jumat' => 'Jumat',
                                'Sabtu' => 'Sabtu',
                                'Minggu' => 'Minggu',
                            ])
                            ->helperText('Isi jika jam layanan untuk rentang hari, misal: Senin - Jumat')
                            ->searchable(),
                        Forms\Components\Toggle::make('is_closed')
                            ->label('Tutup')
                            ->helperText('Aktifkan jika perpustakaan tutup di hari ini')
                            ->live()
                            ->default(false),
                        Forms\Components\TimePicker::make('open_time')
                            ->label('Jam Buka')
                            ->required(fn (Forms\Get $get) => !$get('is_closed'))
                            ->hidden(fn (Forms\Get $get) => $get('is_closed'))
                            ->seconds(false),
                        Forms\Components\TimePicker::make('close_time')
                            ->label('Jam Tutup')
                            ->required(fn (Forms\Get $get) => !$get('is_closed'))
                            ->hidden(fn (Forms\Get $get) => $get('is_closed'))
                            ->seconds(false),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('day')
                    ->label('Hari')
                    ->formatStateUsing(function ($record) {
                        if ($record->end_day) {
                            return $record->day . ' - ' . $record->end_day;
                        }
                        return $record->day;
                    })
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('open_time')
                    ->label('Jam Buka')
                    ->time('H:i')
                    ->sortable(),
                Tables\Columns\TextColumn::make('close_time')
                    ->label('Jam Tutup')
                    ->time('H:i')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_closed')
                    ->label('Status')
                    ->boolean()
                    ->trueIcon('heroicon-o-x-circle')
                    ->falseIcon('heroicon-o-check-circle')
                    ->trueColor('danger')
                    ->falseColor('success'),
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
            'index' => Pages\ListServiceHours::route('/'),
            'create' => Pages\CreateServiceHour::route('/create'),
            'edit' => Pages\EditServiceHour::route('/{record}/edit'),
        ];
    }
}
