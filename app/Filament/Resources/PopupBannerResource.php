<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PopupBannerResource\Pages;
use App\Models\PopupBanner;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class PopupBannerResource extends Resource
{
    protected static ?string $model = PopupBanner::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';

    protected static string|\UnitEnum|null $navigationGroup = 'Informasi Studio';

    protected static ?string $navigationLabel = 'Popup Promo / Banner';

    public static function getNavigationBadge(): ?string
    {
        try {
            return (string) static::getModel()::count();
        } catch (\Throwable $e) {
            return null;
        }
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Section::make([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Promo / Banner')
                        ->placeholder('Contoh: Promo Spesial Game Development & Web')
                        ->required(),
                    Forms\Components\TextInput::make('link_url')
                        ->label('Link Tujuan (URL saat gambar diklik)')
                        ->placeholder('https://example.com atau /quote')
                        ->nullable(),
                    Forms\Components\Select::make('target')
                        ->label('Target Tab Saat Diklik')
                        ->options([
                            '_blank' => 'Buka di Tab Baru (_blank)',
                            '_self' => 'Buka di Tab Ini (_self)',
                        ])
                        ->default('_blank')
                        ->required(),
                    Forms\Components\FileUpload::make('image_path')
                        ->label('Gambar Pop-up Promo')
                        ->image()
                        ->disk('public')
                        ->directory('popups')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif / Tampilkan di Landing Page')
                        ->default(true),
                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan / Prioritas')
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
                Columns\ImageColumn::make('image_path')
                    ->label('Banner')
                    ->disk('public'),
                Columns\TextColumn::make('title')
                    ->label('Judul Promo')
                    ->searchable()
                    ->sortable(),
                Columns\TextColumn::make('link_url')
                    ->label('Link Tujuan')
                    ->limit(35)
                    ->searchable(),
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
            'index' => Pages\ListPopupBanners::route('/'),
            'create' => Pages\CreatePopupBanner::route('/create'),
            'edit' => Pages\EditPopupBanner::route('/{record}/edit'),
        ];
    }
}
