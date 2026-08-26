<?php

namespace App\Filament\Widgets;

use App\Models\Inquiry;
use Filament\Actions;
use Filament\Forms;
use Filament\Tables\Columns;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestInquiriesWidget extends BaseWidget
{
    protected static bool $isLazy = false;

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->query(Inquiry::query()->latest()->limit(5))
            ->heading('Recent Contact Inquiries')
            ->columns([
                Columns\TextColumn::make('name')
                    ->searchable(),
                Columns\TextColumn::make('email')
                    ->searchable(),
                Columns\TextColumn::make('subject')
                    ->limit(30),
                Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->actions([
                Actions\ViewAction::make()
                    ->form([
                        Forms\Components\TextInput::make('name')->disabled(),
                        Forms\Components\TextInput::make('email')->disabled(),
                        Forms\Components\TextInput::make('subject')->disabled(),
                        Forms\Components\Textarea::make('message')->disabled()->rows(5),
                    ]),
            ]);
    }
}
