<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobVacancyResource\Pages;
use App\Models\JobVacancy;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class JobVacancyResource extends Resource
{
    protected static ?string $model = JobVacancy::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-briefcase';

    protected static string|\UnitEnum|null $navigationGroup = 'Karir & Rekrutmen';

    protected static ?string $navigationLabel = 'Lowongan Kerja';

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
                Components\Section::make('Informasi Posisi')
                    ->components([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Posisi / Pekerjaan')
                            ->placeholder('Contoh: Senior Luau / Roblox Scripter')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($set, ?string $state) => $set('slug', Str::slug($state ?? ''))),
                        Forms\Components\TextInput::make('slug')
                            ->label('Slug URL')
                            ->required()
                            ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('department')
                            ->label('Departemen / Divisi')
                            ->options([
                                'Game Development' => 'Game Development (Roblox/Luau)',
                                'Web Development' => 'Web Development (Laravel/React/Astro)',
                                'UI/UX & Creative' => 'UI/UX & 3D Art',
                                'Management & QA' => 'Management & Quality Assurance',
                            ])
                            ->default('Game Development')
                            ->required(),
                        Forms\Components\Select::make('job_type')
                            ->label('Tipe Pekerjaan')
                            ->options([
                                'Full-time' => 'Full-time',
                                'Part-time' => 'Part-time',
                                'Freelance' => 'Freelance / Project-based',
                                'Internship' => 'Internship / Magang',
                            ])
                            ->default('Full-time')
                            ->required(),
                        Forms\Components\Select::make('work_location')
                            ->label('Lokasi Kerja')
                            ->options([
                                'Remote' => 'Remote (Kerja dari Mana Saja)',
                                'Hybrid' => 'Hybrid (Depok/Bogor)',
                                'On-site' => 'On-site Studio',
                            ])
                            ->default('Remote')
                            ->required(),
                        Forms\Components\Select::make('experience_level')
                            ->label('Tingkat Pengalaman')
                            ->options([
                                'Entry-Level' => 'Entry-Level / Junior',
                                'Mid-Level' => 'Mid-Level (1-3 Tahun)',
                                'Senior' => 'Senior (3+ Tahun)',
                                'Lead' => 'Lead / Specialist',
                            ])
                            ->default('Mid-Level')
                            ->required(),
                        Forms\Components\TextInput::make('salary_range')
                            ->label('Kisaran Gaji (Opsional)')
                            ->placeholder('Contoh: IDR 4.000.000 - 8.000.000 / Negotiable'),
                        Forms\Components\DatePicker::make('deadline')
                            ->label('Batas Akhir Pendaftaran'),
                    ])->columns(2),

                Components\Section::make('Deskripsi & Kualifikasi')
                    ->components([
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Pekerjaan')
                            ->rows(4)
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('responsibilities')
                            ->label('Tanggung Jawab Utama')
                            ->placeholder('Ketik tanggung jawab lalu tekan Enter')
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('requirements')
                            ->label('Kualifikasi / Persyaratan')
                            ->placeholder('Ketik kualifikasi lalu tekan Enter')
                            ->columnSpanFull(),
                        Forms\Components\TagsInput::make('benefits')
                            ->label('Benefit & Fasilitas')
                            ->placeholder('Ketik benefit lalu tekan Enter')
                            ->columnSpanFull(),
                    ]),

                Components\Section::make('Pengaturan Publikasi')
                    ->components([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Buka Lowongan (Aktif)')
                            ->default(true),
                        Forms\Components\TextInput::make('sort_order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->required(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('title')
                    ->label('Posisi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Columns\TextColumn::make('department')
                    ->label('Departemen')
                    ->badge()
                    ->sortable(),
                Columns\TextColumn::make('job_type')
                    ->label('Tipe')
                    ->sortable(),
                Columns\TextColumn::make('work_location')
                    ->label('Lokasi'),
                Columns\TextColumn::make('applications_count')
                    ->label('Jumlah Pelamar')
                    ->counts('applications')
                    ->sortable(),
                Columns\IconColumn::make('is_active')
                    ->label('Status Buka')
                    ->boolean(),
                Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filters\SelectFilter::make('department')
                    ->options([
                        'Game Development' => 'Game Development',
                        'Web Development' => 'Web Development',
                        'UI/UX & Creative' => 'UI/UX & Creative',
                        'Management & QA' => 'Management & QA',
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
            'index' => Pages\ListJobVacancies::route('/'),
            'create' => Pages\CreateJobVacancy::route('/create'),
            'edit' => Pages\EditJobVacancy::route('/{record}/edit'),
        ];
    }
}
