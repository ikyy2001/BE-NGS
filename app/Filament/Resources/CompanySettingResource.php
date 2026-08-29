<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CompanySettingResource\Pages;
use App\Models\CompanySetting;
use Filament\Actions;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components;
use Filament\Schemas\Schema;
use Filament\Tables\Columns;
use Filament\Tables\Table;

class CompanySettingResource extends Resource
{
    protected static ?string $model = CompanySetting::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string|\UnitEnum|null $navigationGroup = 'Informasi Studio';

    protected static ?string $navigationLabel = 'Pengaturan Studio';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Components\Section::make('Identitas Studio')
                    ->description('Nama brand dan slogan utama studio')
                    ->components([
                        Forms\Components\TextInput::make('studio_name')
                            ->label('Nama Studio')
                            ->default('Nusa Garuda Studio')
                            ->required(),
                        Forms\Components\TextInput::make('tagline')
                            ->label('Tagline / Slogan')
                            ->default('Creative Technology & Game Development Studio'),
                        Forms\Components\TextInput::make('copyright_text')
                            ->label('Teks Copyright Footer')
                            ->default('Design By Nusa Garuda Studio'),
                    ])->columns(3),

                Components\Section::make('Kontak & Lokasi')
                    ->description('Informasi kontak resmi studio')
                    ->components([
                        Forms\Components\TextInput::make('phone')
                            ->label('Nomor Telepon')
                            ->placeholder('+62 821-6275-7576'),
                        Forms\Components\TextInput::make('whatsapp_number')
                            ->label('Nomor WhatsApp')
                            ->helperText('Gunakan format angka tanpa tanda plus, contoh: 6282162757576')
                            ->placeholder('6282162757576'),
                        Forms\Components\TextInput::make('email')
                            ->label('Alamat Email')
                            ->email()
                            ->placeholder('info@nusagarudastudio.my.id'),
                        Forms\Components\TextInput::make('address')
                            ->label('Alamat Kantor (Teks)')
                            ->placeholder('Depok - Bogor, Indonesia')
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('latitude')
                            ->label('Latitude (Garis Lintang)')
                            ->placeholder('-6.402484')
                            ->helperText('Contoh: -6.402484 (Dapatkan dari klik kanan titik lokasi di Google Maps -> Salin koordinat)'),
                        Forms\Components\TextInput::make('longitude')
                            ->label('Longitude (Garis Bujur)')
                            ->placeholder('106.794243')
                            ->helperText('Contoh: 106.794243 (Memastikan pin peta akurat 100% pada lokasi studio)'),
                        Forms\Components\TextInput::make('google_maps_url')
                            ->label('Link Google Maps Langsung (Opsional)')
                            ->helperText('Tautan langsung untuk membuka halaman Google Maps (contoh: https://maps.app.goo.gl/... atau https://maps.google.com/...)')
                            ->placeholder('https://maps.google.com/?q=-6.402484,106.794243')
                            ->url()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('google_maps_embed_url')
                            ->label('Custom Embed Map URL (Opsional)')
                            ->helperText('Hanya diisi jika ingin menggunakan custom iframe embed URL (https://www.google.com/maps/embed?pb=...)')
                            ->placeholder('https://www.google.com/maps/embed?...')
                            ->columnSpanFull(),
                    ])->columns(2),

                Components\Section::make('Media Sosial & Komunitas')
                    ->description('Tautan media sosial dan platform komunitas game')
                    ->components([
                        Forms\Components\TextInput::make('discord_url')
                            ->label('Discord Server')
                            ->url()
                            ->placeholder('https://discord.gg/...'),
                        Forms\Components\TextInput::make('roblox_group_url')
                            ->label('Roblox Group')
                            ->url()
                            ->placeholder('https://www.roblox.com/groups/...'),
                        Forms\Components\TextInput::make('instagram_url')
                            ->label('Instagram URL')
                            ->url()
                            ->placeholder('https://instagram.com/...'),
                        Forms\Components\TextInput::make('tiktok_url')
                            ->label('TikTok URL')
                            ->url()
                            ->placeholder('https://tiktok.com/@...'),
                        Forms\Components\TextInput::make('youtube_url')
                            ->label('YouTube URL')
                            ->url()
                            ->placeholder('https://youtube.com/@...'),
                        Forms\Components\TextInput::make('github_url')
                            ->label('GitHub URL')
                            ->url()
                            ->placeholder('https://github.com/...'),
                        Forms\Components\TextInput::make('linkedin_url')
                            ->label('LinkedIn URL')
                            ->url()
                            ->placeholder('https://linkedin.com/company/...'),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Columns\TextColumn::make('studio_name')
                    ->label('Nama Studio')
                    ->weight('bold'),
                Columns\TextColumn::make('email')
                    ->label('Email'),
                Columns\TextColumn::make('phone')
                    ->label('Telepon'),
                Columns\TextColumn::make('whatsapp_number')
                    ->label('WhatsApp'),
                Columns\TextColumn::make('address')
                    ->label('Lokasi'),
                Columns\TextColumn::make('updated_at')
                    ->label('Terakhir Diupdate')
                    ->dateTime(),
            ])
            ->actions([
                Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCompanySettings::route('/'),
            'create' => Pages\CreateCompanySetting::route('/create'),
            'edit' => Pages\EditCompanySetting::route('/{record}/edit'),
        ];
    }
}
