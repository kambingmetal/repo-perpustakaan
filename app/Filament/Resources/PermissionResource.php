<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PermissionResource\Pages;
use App\Filament\Resources\PermissionResource\RelationManagers;
use App\Models\Permission;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PermissionResource extends Resource
{
    protected static ?string $model = Permission::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    
    protected static ?string $navigationLabel = 'Hak Akses Admin';
    
    protected static ?string $modelLabel = 'Hak Akses';
    
    protected static ?string $pluralModelLabel = 'Hak Akses';
    
    protected static ?string $navigationGroup = 'Manajemen Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pengaturan Hak Akses')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->label('Admin')
                            ->options(User::whereIn('role', ['admin', 'superadmin'])->pluck('name', 'id'))
                            ->required()
                            ->searchable()
                            ->preload()
                            ->helperText('Pilih admin yang akan diberikan hak akses'),
                        Forms\Components\TextInput::make('resource')
                            ->label('Nama Resource/Module')
                            ->required()
                            ->maxLength(255)
                            ->helperText('Contoh: books, users, categories, dll')
                            ->placeholder('Masukkan nama resource'),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Izin Akses')
                    ->schema([
                        Forms\Components\Toggle::make('can_view')
                            ->label('Dapat Melihat')
                            ->helperText('Izinkan admin untuk melihat data')
                            ->inline(false),
                        Forms\Components\Toggle::make('can_create')
                            ->label('Dapat Membuat')
                            ->helperText('Izinkan admin untuk membuat data baru')
                            ->inline(false),
                        Forms\Components\Toggle::make('can_edit')
                            ->label('Dapat Mengedit')
                            ->helperText('Izinkan admin untuk mengedit data')
                            ->inline(false),
                        Forms\Components\Toggle::make('can_delete')
                            ->label('Dapat Menghapus')
                            ->helperText('Izinkan admin untuk menghapus data')
                            ->inline(false),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Admin')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.role')
                    ->label('Role')
                    ->badge()
                    ->colors([
                        'warning' => 'admin',
                        'success' => 'superadmin',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'admin' => 'Admin',
                        'superadmin' => 'Super Admin',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('resource')
                    ->label('Resource/Module')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('can_view')
                    ->label('Lihat')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('can_create')
                    ->label('Buat')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('can_edit')
                    ->label('Edit')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\IconColumn::make('can_delete')
                    ->label('Hapus')
                    ->boolean()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('Filter Admin')
                    ->options(User::whereIn('role', ['admin', 'superadmin'])->pluck('name', 'id'))
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn () => auth()->user()->isSuperAdmin()),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()
                        ->visible(fn () => auth()->user()->isSuperAdmin()),
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
            'index' => Pages\ListPermissions::route('/'),
            'create' => Pages\CreatePermission::route('/create'),
            'edit' => Pages\EditPermission::route('/{record}/edit'),
        ];
    }
    
    public static function canViewAny(): bool
    {
        return auth()->user()->isSuperAdmin();
    }
}
