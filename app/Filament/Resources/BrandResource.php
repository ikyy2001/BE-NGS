<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrandResource\Pages;
use App\Models\Brand;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class BrandResource extends Resource
{
    protected static ?string $model = Brand::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-building-office-2';

    protected static string|\UnitEnum|null $navigationGroup = 'Informasi Studio';

    protected static ?string $navigationLabel = 'Mitra & Brand';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Section::make([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Brand / Mitra')
                        ->required(),
                    Forms\Components\TextInput::make('website_url')
                        ->label('Website URL (Opsional)')
                        ->url()
                        ->placeholder('https://example.com'),
                    Forms\Components\FileUpload::make('logo_path')
                        ->label('Logo Brand')
                        ->image()
                        ->disk('public')
                        ->directory('brands')
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif / Tampilkan')
                        ->default(true),
                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0)
                        ->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Columns\ImageColumn::make('logo_path')
                    ->label('Logo')
                    ->disk('public'),
                Columns\TextColumn::make('name')
                    ->label('Nama Brand')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('website_url')
                    ->label('Website')
                    ->limit(30),
                Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
                Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable(),
                Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
