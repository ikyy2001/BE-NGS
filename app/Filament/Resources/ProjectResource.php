<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use BackedEnum;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use UnitEnum;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

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
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('category')
                        ->required(),
                    Forms\Components\TextInput::make('client')
                        ->required(),
                    Forms\Components\TextInput::make('technology')
                        ->required(),
                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->rows(3)
                        ->columnSpanFull(),
                    Forms\Components\RichEditor::make('detail_description')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('image_url')
                        ->label('Project Image')
                        ->image()
                        ->disk('public')
                        ->directory('projects')
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('is_featured')
                        ->label('Featured Project')
                        ->default(false),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\ImageColumn::make('image_url')
                    ->label('Thumbnail')
                    ->disk('public'),
                Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('category')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('client')
                    ->searchable(),
                Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filters\SelectFilter::make('category')
                    ->options([
                        'Roblox Development' => 'Roblox Development',
                        'Website Development' => 'Website Development',
                        'Cloud & Media Solutions' => 'Cloud & Media Solutions',
                        'Web Application' => 'Web Application',
                    ]),
                Filters\TernaryFilter::make('is_featured')
                    ->label('Featured Status'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
