<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteResource\Pages;
use App\Models\Quote;
use BackedEnum;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use UnitEnum;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static string|\UnitEnum|null $navigationGroup = 'Pesan & Penawaran';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'success';
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit(Model $record): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Section::make([
                    Forms\Components\TextInput::make('name')
                        ->disabled(),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->disabled(),
                    Forms\Components\TextInput::make('company')
                        ->disabled(),
                    Forms\Components\TextInput::make('organization_size')
                        ->disabled(),
                    Forms\Components\Textarea::make('goals_challenges')
                        ->label('Goals & Challenges')
                        ->disabled()
                        ->rows(6)
                        ->columnSpanFull(),
                    Forms\Components\DateTimePicker::make('created_at')
                        ->disabled(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('company')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('organization_size')
                    ->badge()
                    ->sortable(),
                Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Filters\SelectFilter::make('organization_size')
                    ->options([
                        'small' => 'Small',
                        'medium' => 'Medium',
                        'large' => 'Large',
                    ]),
            ])
            ->actions([
                Actions\ViewAction::make(),
            ])
            ->bulkActions([
                // Read only
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListQuotes::route('/'),
        ];
    }
}
