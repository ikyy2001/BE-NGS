<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaCoverageResource\Pages;
use App\Models\MediaCoverage;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class MediaCoverageResource extends Resource
{
    protected static ?string $model = MediaCoverage::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

    protected static string|\UnitEnum|null $navigationGroup = 'Blog & Konten';

    protected static ?string $navigationLabel = 'Media & Liputan';

    protected static ?string $modelLabel = 'Liputan Media';

    protected static ?string $pluralModelLabel = 'Media & Liputan';

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Group::make([
                    Components\Section::make([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Berita')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('outlet_name')
                            ->label('Nama Media')
                            ->placeholder('contoh: Kompas, CNN Indonesia, Detik')
                            ->required(),
                        Forms\Components\TextInput::make('source_url')
                            ->label('URL Artikel Asli')
                            ->url()
                            ->placeholder('https://...')
                            ->helperText('Tautan ke halaman berita di media yang meliput.'),
                        Forms\Components\Textarea::make('excerpt')
                            ->label('Ringkasan (untuk kartu)')
                            ->rows(3)
                            ->maxLength(500)
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('body')
                            ->label('Isi Halaman Berita')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),
                ])->columnSpan(2),

                Components\Group::make([
                    Components\Section::make([
                        Forms\Components\FileUpload::make('cover_image')
                            ->label('Gambar Sampul')
                            ->image()
                            ->disk('public')
                            ->directory('media'),
                        Forms\Components\FileUpload::make('outlet_logo')
                            ->label('Logo Media')
                            ->image()
                            ->disk('public')
                            ->directory('media/outlets'),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Liputan')
                            ->default(now()),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->helperText('Angka lebih kecil tampil lebih dulu.'),
                    ]),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published_at', 'desc')
            ->columns([
                Columns\ImageColumn::make('cover_image')
                    ->label('Sampul')
                    ->disk('public'),
                Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                Columns\TextColumn::make('outlet_name')
                    ->label('Media')
                    ->searchable()
                    ->badge()
                    ->sortable(),
                Columns\IconColumn::make('is_published')
                    ->label('Publik')
                    ->boolean(),
                Columns\TextColumn::make('published_at')
                    ->label('Tanggal Liputan')
                    ->dateTime()
                    ->sortable(),
                Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filters\TernaryFilter::make('is_published')
                    ->label('Status publikasi'),
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
            'index' => Pages\ListMediaCoverages::route('/'),
            'create' => Pages\CreateMediaCoverage::route('/create'),
            'edit' => Pages\EditMediaCoverage::route('/{record}/edit'),
        ];
    }
}
