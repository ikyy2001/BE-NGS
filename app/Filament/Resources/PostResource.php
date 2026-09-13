<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-document-text';

    protected static string|\UnitEnum|null $navigationGroup = 'Blog & Konten';

    protected static ?string $navigationLabel = 'Artikel Blog';

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
                            ->label('Judul Artikel')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\RichEditor::make('body')
                            ->label('Isi Artikel')
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),

                    Components\Section::make('Pengaturan SEO & Meta Tags Google')
                        ->description('Optimasi kata kunci utama, secondary keywords (LSI), dan meta description untuk meningkatkan ranking Google')
                        ->components([
                            Forms\Components\TextInput::make('primary_keyword')
                                ->label('Primary Keyword (Focus Keyword)')
                                ->placeholder('contoh: jasa pembuatan game roblox')
                                ->helperText('Target kata kunci utama yang ingin diperingkat di halaman 1 Google.')
                                ->maxLength(255),
                            Forms\Components\TagsInput::make('secondary_keywords')
                                ->label('Secondary Keywords (Kata Kunci Turunan / LSI)')
                                ->placeholder('Ketik kata kunci lalu tekan Enter...')
                                ->separator(',')
                                ->helperText('Ketik kata kunci pendukung lalu tekan Enter (contoh: script luau roblox, harga bikin game roblox).')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('meta_title')
                                ->label('Custom Meta Title (Judul Google Search)')
                                ->placeholder('Jika kosong, akan otomatis memakai Judul Artikel')
                                ->helperText('Judul khusus di SERP Google. Disarankan 50 - 60 karakter.')
                                ->maxLength(70),
                            Forms\Components\Select::make('schema_type')
                                ->label('Tipe Schema JSON-LD')
                                ->options([
                                    'BlogPosting' => 'BlogPosting (Standar Blog & Wawasan)',
                                    'Article' => 'Article (Artikel Umum)',
                                    'TechArticle' => 'TechArticle (Tutorial & Panduan Teknis)',
                                    'NewsArticle' => 'NewsArticle (Berita & Press Release)',
                                ])
                                ->default('BlogPosting'),
                            Forms\Components\Textarea::make('meta_description')
                                ->label('Custom Meta Description')
                                ->placeholder('Deskripsi ringkas yang memikat calon pembaca di hasil pencarian Google...')
                                ->rows(3)
                                ->maxLength(160)
                                ->helperText('Ringkasan cuplikan di hasil pencarian Google (disarankan 120 - 160 karakter).')
                                ->columnSpanFull(),
                            Forms\Components\TextInput::make('canonical_url')
                                ->label('Custom Canonical URL (Opsional)')
                                ->placeholder('https://nusagarudastudio.com/blog/slug-artikel')
                                ->url()
                                ->helperText('Biarkan kosong jika ingin menggunakan URL kanonis default website.')
                                ->columnSpanFull(),
                        ])->columns(2),
                ])->columnSpan(2),

                Components\Group::make([
                    Components\Section::make([
                        Forms\Components\Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->nullable(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Sampul Utama')
                            ->image()
                            ->disk('public')
                            ->directory('blog'),
                        Forms\Components\FileUpload::make('og_image')
                            ->label('Gambar Khusus Social Share (OG Image)')
                            ->image()
                            ->disk('public')
                            ->directory('blog/og')
                            ->helperText('Opsional. Digunakan saat link artikel dibagikan di WhatsApp, Twitter, Facebook.'),
                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                        Forms\Components\DateTimePicker::make('published_at')
                            ->label('Tanggal Rilis')
                            ->default(now()),
                    ]),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                Columns\ImageColumn::make('image')
                    ->label('Sampul')
                    ->disk('public'),
                Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                Columns\TextColumn::make('primary_keyword')
                    ->label('Primary Keyword')
                    ->badge()
                    ->color('primary')
                    ->searchable()
                    ->toggleable(),
                Columns\TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->sortable(),
                Columns\IconColumn::make('is_published')
                    ->label('Publik')
                    ->boolean(),
                Columns\TextColumn::make('published_at')
                    ->label('Tanggal Rilis')
                    ->dateTime()
                    ->sortable(),
                Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
