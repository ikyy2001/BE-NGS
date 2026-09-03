<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PricingPlanResource\Pages;
use App\Models\PricingPlan;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class PricingPlanResource extends Resource
{
    protected static ?string $model = PricingPlan::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-currency-dollar';

    protected static string|\UnitEnum|null $navigationGroup = 'Informasi Studio';

    protected static ?string $navigationLabel = 'Paket Harga / Layanan';

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
                Components\Section::make('Informasi Paket & Harga')
                    ->components([
                        Forms\Components\TextInput::make('title')
                            ->label('Nama Paket Layanan')
                            ->placeholder('Contoh: Website & Platform Development')
                            ->required(),
                        Forms\Components\Select::make('category')
                            ->label('Kategori Layanan')
                            ->options([
                                'general' => 'Umum / Website & Platform',
                                'roblox' => 'Roblox Game Development',
                                'design' => 'UI/UX Design',
                            ])
                            ->default('general')
                            ->required(),
                        Forms\Components\TextInput::make('price')
                            ->label('Harga / Format Harga')
                            ->placeholder('Contoh: Starting at IDR 300K')
                            ->required(),
                        Forms\Components\TextInput::make('billing_period')
                            ->label('Periode / Tipe Pembayaran (Opsional)')
                            ->placeholder('Contoh: /project atau One-time')
                            ->nullable(),
                        Forms\Components\TextInput::make('badge')
                            ->label('Badge Khusus (Opsional)')
                            ->placeholder('Contoh: POPULAR atau BEST VALUE')
                            ->nullable(),
                        Forms\Components\TextInput::make('subtitle')
                            ->label('Deskripsi Singkat')
                            ->placeholder('Contoh: Solusi web modern, cepat, dan terukur.')
                            ->columnSpanFull(),
                    ])->columns(2),

                Components\Section::make('Daftar Fitur & Tombol CTA')
                    ->components([
                        Forms\Components\TagsInput::make('features')
                            ->label('Fitur-fitur Layanan')
                            ->placeholder('Ketik nama fitur lalu tekan Enter')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('button_text')
                            ->label('Teks Tombol')
                            ->default('Choose Plan')
                            ->required(),
                        Forms\Components\TextInput::make('button_url')
                            ->label('Link Tombol')
                            ->default('/quote')
                            ->required(),
                    ])->columns(2),

                Components\Section::make('Pengaturan Tampilan')
                    ->components([
                        Forms\Components\Toggle::make('is_featured')
                            ->label('Sorot sebagai Paket Unggulan (Featured/Highlight)')
                            ->default(false),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif / Tampilkan di Website')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan Tampilan')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort_order')
            ->defaultSort('sort_order', 'asc')
            ->columns([
                Columns\TextColumn::make('title')
                    ->label('Nama Paket')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'roblox' => 'warning',
                        'design' => 'info',
                        default => 'primary',
                    })
                    ->sortable(),
                Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->sortable(),
                Columns\TextColumn::make('badge')
                    ->label('Badge')
                    ->badge(),
                Columns\IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),
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
            ->filters([
                Filters\SelectFilter::make('category')
                    ->label('Filter Kategori')
                    ->options([
                        'general' => 'Umum / Website & Platform',
                        'roblox' => 'Roblox Game Development',
                        'design' => 'UI/UX Design',
                    ]),
                Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
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
            'index' => Pages\ListPricingPlans::route('/'),
            'create' => Pages\CreatePricingPlan::route('/create'),
            'edit' => Pages\EditPricingPlan::route('/{record}/edit'),
        ];
    }
}
