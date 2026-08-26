<?php

namespace App\Filament\Widgets;

use App\Models\Quote;
use Filament\Actions;
use Filament\Forms;
use Filament\Tables\Columns;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestQuotesWidget extends BaseWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 4;

    public function table(Table $table): Table
    {
        return $table
            ->query(Quote::query()->latest()->limit(5))
            ->heading('Recent Quote Requests')
            ->columns([
                Columns\TextColumn::make('name')
                    ->searchable(),
                Columns\TextColumn::make('company')
                    ->searchable(),
                Columns\TextColumn::make('organization_size')
                    ->badge(),
                Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->actions([
                Actions\ViewAction::make()
                    ->form([
                        Forms\Components\TextInput::make('name')->disabled(),
                        Forms\Components\TextInput::make('email')->disabled(),
                        Forms\Components\TextInput::make('company')->disabled(),
                        Forms\Components\TextInput::make('organization_size')->disabled(),
                        Forms\Components\Textarea::make('goals_challenges')->disabled()->rows(5),
                    ]),
            ]);
    }
}
