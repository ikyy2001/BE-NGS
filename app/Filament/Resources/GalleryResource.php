<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use BackedEnum;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Table;
use UnitEnum;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationLabel = 'Gallery';

    protected static string|\UnitEnum|null $navigationGroup = 'Portofolio & Konten';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Section::make([
                    Forms\Components\TextInput::make('title')
                        ->required(),
                    Forms\Components\Select::make('category')
                        ->options([
                            'product' => 'Product',
                            'photo' => 'Photo',
                        ])
                        ->required(),
                    Forms\Components\FileUpload::make('image_url')
                        ->label('Gallery Image')
                        ->image()
                        ->disk('public')
                        ->directory('gallery')
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\ImageColumn::make('image_url')
                    ->label('Preview')
                    ->disk('public'),
                Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('category')
                    ->badge()
                    ->sortable(),
                Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filters\SelectFilter::make('category')
                    ->options([
                        'product' => 'Product',
                        'photo' => 'Photo',
                    ]),
            ])
            ->actions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}
