<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Models\Faq;
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

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static string|\UnitEnum|null $navigationGroup = 'Informasi Studio';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Section::make([
                    Forms\Components\Select::make('category')
                        ->options([
                            'general' => 'General',
                            'commercial' => 'Commercial',
                            'maintenance' => 'Maintenance',
                            'technology' => 'Technology',
                            'roblox' => 'Roblox Game Development',
                        ])
                        ->required(),
                    Forms\Components\TextInput::make('sort_order')
                        ->numeric()
                        ->default(0)
                        ->required(),
                    Forms\Components\TextInput::make('title')
                        ->label('Question')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Textarea::make('description')
                        ->label('Answer')
                        ->required()
                        ->rows(4)
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('is_active')
                        ->label('Active Status')
                        ->default(true),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Columns\TextColumn::make('sort_order')
                    ->sortable(),
                Columns\TextColumn::make('category')
                    ->badge()
                    ->sortable(),
                Columns\TextColumn::make('title')
                    ->label('Question')
                    ->searchable()
                    ->wrap(),
                Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->boolean(),
                Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filters\SelectFilter::make('category')
                    ->options([
                        'general' => 'General',
                        'commercial' => 'Commercial',
                        'maintenance' => 'Maintenance',
                        'technology' => 'Technology',
                        'roblox' => 'Roblox Game Development',
                    ]),
                Filters\TernaryFilter::make('is_active')
                    ->label('Active Status'),
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
