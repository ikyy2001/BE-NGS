<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AccordionShowcaseResource\Pages;
use App\Models\AccordionShowcase;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Table;

class AccordionShowcaseResource extends Resource
{
    protected static ?string $model = AccordionShowcase::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-queue-list';

    protected static ?string $navigationLabel = 'Accordion Showcase';

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
                        ->label('Title / Label')
                        ->placeholder('e.g. Roblox & Game Development')
                        ->required(),
                    Forms\Components\TextInput::make('link')
                        ->label('Link URL')
                        ->placeholder('e.g. /service or https://...')
                        ->nullable(),
                    Forms\Components\TextInput::make('sort_order')
                        ->label('Sort Order')
                        ->numeric()
                        ->default(0),
                    Forms\Components\Toggle::make('is_active')
                        ->label('Active')
                        ->default(true),
                    Forms\Components\FileUpload::make('image_url')
                        ->label('Showcase Image')
                        ->image()
                        ->disk('public')
                        ->directory('showcases')
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
                Columns\TextColumn::make('link')
                    ->searchable(),
                Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
                Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order', 'asc')
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
            'index' => Pages\ListAccordionShowcases::route('/'),
            'create' => Pages\CreateAccordionShowcase::route('/create'),
            'edit' => Pages\EditAccordionShowcase::route('/{record}/edit'),
        ];
    }
}
