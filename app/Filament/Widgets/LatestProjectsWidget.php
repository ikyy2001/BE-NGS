<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Tables\Columns;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestProjectsWidget extends BaseWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(Project::query()->latest()->limit(5))
            ->heading('Recent Portfolio Projects')
            ->columns([
                Columns\ImageColumn::make('image_url')
                    ->label('Thumbnail')
                    ->disk('public'),
                Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('category')
                    ->badge(),
                Columns\TextColumn::make('client'),
                Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
                Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ]);
    }
}
