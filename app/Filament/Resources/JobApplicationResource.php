<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JobApplicationResource\Pages;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Filters;
use Filament\Tables\Table;

class JobApplicationResource extends Resource
{
    protected static ?string $model = JobApplication::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-user-group';

    protected static string|\UnitEnum|null $navigationGroup = 'Karir & Rekrutmen';

    protected static ?string $navigationLabel = 'Data Pelamar';

    public static function getNavigationBadge(): ?string
    {
        try {
            $pendingCount = static::getModel()::where('status', 'pending')->count();
            return $pendingCount > 0 ? (string) $pendingCount : null;
        } catch (\Throwable $e) {
            return null;
        }
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Section::make('Informasi Pelamar')
                    ->components([
                        Forms\Components\Select::make('job_vacancy_id')
                            ->label('Posisi Lowongan')
                            ->options(fn () => JobVacancy::pluck('title', 'id'))
                            ->disabled(),
                        Forms\Components\TextInput::make('full_name')
                            ->label('Nama Lengkap')
                            ->disabled(),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->disabled(),
                        Forms\Components\TextInput::make('phone')
                            ->label('WhatsApp / Nomor Telepon')
                            ->disabled(),
                        Forms\Components\TextInput::make('portfolio_url')
                            ->label('Tautan Portofolio / Roblox')
                            ->url()
                            ->columnSpanFull()
                            ->disabled(),
                        Forms\Components\FileUpload::make('resume_path')
                            ->label('Berkas CV / Resume')
                            ->disk('public')
                            ->downloadable()
                            ->openable()
                            ->columnSpanFull()
                            ->disabled(),
                        Forms\Components\Textarea::make('cover_letter')
                            ->label('Surat Lamaran / Pengantar')
                            ->rows(4)
                            ->columnSpanFull()
                            ->disabled(),
                    ])->columns(2),

                Components\Section::make('Status & Evaluasi HR')
                    ->components([
                        Forms\Components\Select::make('status')
                            ->label('Status Lamaran')
                            ->options([
                                'pending' => 'Pending (Menunggu Review)',
                                'reviewed' => 'Sudah Direview',
                                'interviewed' => 'Tahap Wawancara / Test',
                                'accepted' => 'Diterima (Hired)',
                                'rejected' => 'Ditolak (Rejected)',
                            ])
                            ->default('pending')
                            ->required(),
                        Forms\Components\Textarea::make('admin_notes')
                            ->label('Catatan HR / Hasil Wawancara')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('full_name')
                    ->label('Nama Pelamar')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),
                Columns\TextColumn::make('vacancy.title')
                    ->label('Posisi Dilamar')
                    ->badge()
                    ->sortable()
                    ->default('General Application'),
                Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),
                Columns\TextColumn::make('phone')
                    ->label('Telepon'),
                Columns\TextColumn::make('portfolio_url')
                    ->label('Portofolio')
                    ->limit(25)
                    ->url(fn ($record) => $record->portfolio_url, true),
                Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'reviewed',
                        'primary' => 'interviewed',
                        'success' => 'accepted',
                        'danger' => 'rejected',
                    ]),
                Columns\TextColumn::make('created_at')
                    ->label('Tanggal Lamar')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Filters\SelectFilter::make('job_vacancy_id')
                    ->label('Filter Posisi')
                    ->options(fn () => JobVacancy::pluck('title', 'id')),
                Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewed' => 'Reviewed',
                        'interviewed' => 'Interviewed',
                        'accepted' => 'Accepted',
                        'rejected' => 'Rejected',
                    ]),
            ])
            ->actions([
                Actions\EditAction::make()->label('Evaluasi'),
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
            'index' => Pages\ListJobApplications::route('/'),
            'edit' => Pages\EditJobApplication::route('/{record}/edit'),
        ];
    }
}
