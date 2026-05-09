<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisLayananResource\Pages;
use App\Models\JenisLayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class JenisLayananResource extends Resource
{
    protected static ?string $model = JenisLayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationLabel = 'Jenis Layanan';

    protected static ?string $modelLabel = 'Jenis Layanan';

    protected static ?string $pluralModelLabel = 'Jenis Layanan';

    protected static ?string $navigationGroup = 'Manajemen Layanan';

    protected static ?int $navigationSort = 1;

    // ----------------------------------------------------------------
    // FORM
    // ----------------------------------------------------------------
    public static function form(Form $form): Form
    {
        return $form->schema([

            Forms\Components\Section::make('Informasi Paket')
                ->description('Isi data pokok paket wisata.')
                ->schema([

                    Forms\Components\TextInput::make('nama')
                        ->label('Nama Paket')
                        ->placeholder('Contoh: Paket Umroh Ekonomi 9 Hari')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(255)
                        ->columnSpanFull(),

                    Forms\Components\Select::make('jenis_wisata')
                        ->label('Jenis Wisata')
                        ->options([
                            'Wisata Religi'      => 'Wisata Religi',
                            'Wisata Lokal'       => 'Wisata Lokal',
                            'Wisata Mancanegara' => 'Wisata Mancanegara',
                        ])
                        ->required()
                        ->native(false),

                    Forms\Components\TextInput::make('lokasi')
                        ->label('Lokasi')
                        ->placeholder('Contoh: Makkah, Bali, Malaysia')
                        ->required()
                        ->maxLength(100),

                    Forms\Components\TextInput::make('durasi')
                        ->label('Durasi')
                        ->placeholder('Contoh: 9 hari, 4D3N')
                        ->required()
                        ->maxLength(50),

                    Forms\Components\TextInput::make('harga')
                        ->label('Harga (Rp)')
                        ->placeholder('Contoh: 22500000')
                        ->required()
                        ->numeric()
                        ->prefix('Rp')
                        ->minValue(0),

                ])
                ->columns(2),

            Forms\Components\Section::make('Deskripsi')
                ->schema([

                    Forms\Components\Textarea::make('p_singkat')
                        ->label('Paragraf Singkat')
                        ->placeholder('Ringkasan paket, tampil di kartu layanan.')
                        ->required()
                        ->rows(3)
                        ->maxLength(500)
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('deskripsi')
                        ->label('Deskripsi Lengkap')
                        ->toolbarButtons([
                            'bold', 'italic', 'underline',
                            'bulletList', 'orderedList',
                            'h2', 'h3',
                            'link',
                        ])
                        ->columnSpanFull(),

                ]),

            Forms\Components\Section::make('Foto Paket')
                ->schema([

                    Forms\Components\FileUpload::make('foto')
                        ->label('Upload Foto')
                        ->image()
                        ->disk('public')
                        ->directory('paket')
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('800')
                        ->imageResizeTargetHeight('450')
                        ->maxSize(2048)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                        ->helperText('Format: JPG, PNG, atau WebP. Maks 2 MB. Rasio ideal 16:9.')
                        ->columnSpanFull()
                        ->deleteUploadedFileUsing(function ($file) {
                            Storage::disk('public')->delete($file);
                        }),

                ]),

            // ── Relasi Repeater ─────────────────────────────────────

            Forms\Components\Section::make('Syarat & Ketentuan')
                ->schema([
                    Forms\Components\Repeater::make('syaratKetentuan')
                        ->label('')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('isi')
                                ->label('Poin syarat')
                                ->required(),
                            Forms\Components\TextInput::make('urutan')
                                ->label('Urutan')
                                ->numeric()
                                ->default(null),
                        ])
                        ->orderColumn('urutan')
                        ->addActionLabel('+ Tambah poin')
                        ->collapsible()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Fasilitas')
                ->schema([
                    Forms\Components\Repeater::make('fasilitas')
                        ->label('')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('nama')
                                ->label('Nama fasilitas')
                                ->required(),
                            Forms\Components\TextInput::make('urutan')
                                ->label('Urutan')
                                ->numeric()
                                ->default(null),
                        ])
                        ->orderColumn('urutan')
                        ->addActionLabel('+ Tambah fasilitas')
                        ->collapsible()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Keunggulan Paket')
                ->schema([
                    Forms\Components\Repeater::make('keunggulanPaket')
                        ->label('')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('isi')
                                ->label('Poin keunggulan')
                                ->required(),
                            Forms\Components\TextInput::make('urutan')
                                ->label('Urutan')
                                ->numeric()
                                ->default(null),
                        ])
                        ->orderColumn('urutan')
                        ->addActionLabel('+ Tambah keunggulan')
                        ->collapsible()
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Itinerary')
                ->schema([
                    Forms\Components\Repeater::make('itinerary')
                        ->label('')
                        ->relationship()
                        ->schema([
                            Forms\Components\TextInput::make('hari')
                                ->label('Hari ke-')
                                ->numeric()
                                ->required(),
                            Forms\Components\Textarea::make('deskripsi')
                                ->label('Deskripsi')
                                ->rows(3)
                                ->required(),
                        ])
                        ->orderColumn('hari')
                        ->addActionLabel('+ Tambah hari')
                        ->collapsible()
                        ->columnSpanFull(),
                ]),

        ]);
    }

    // ----------------------------------------------------------------
    // TABLE
    // ----------------------------------------------------------------
    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\ImageColumn::make('foto')
                    ->label('Foto')
                    ->disk('public')
                    ->height(56)
                    ->width(80)
                    ->defaultImageUrl(asset('img/no-image.png'))
                    ->extraImgAttributes(['style' => 'object-fit:cover;border-radius:6px;']),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Paket')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\BadgeColumn::make('jenis_wisata')
                    ->label('Jenis')
                    ->colors([
                        'warning' => 'Wisata Religi',
                        'success' => 'Wisata Lokal',
                        'info'    => 'Wisata Mancanegara',
                    ]),

                Tables\Columns\TextColumn::make('lokasi')
                    ->label('Lokasi')
                    ->icon('heroicon-m-map-pin')
                    ->searchable(),

                Tables\Columns\TextColumn::make('durasi')
                    ->label('Durasi'),

                Tables\Columns\TextColumn::make('harga')
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])

            ->defaultSort('created_at', 'desc')

            ->filters([
                Tables\Filters\SelectFilter::make('jenis_wisata')
                    ->label('Filter Jenis Wisata')
                    ->options([
                        'Wisata Religi'      => 'Wisata Religi',
                        'Wisata Lokal'       => 'Wisata Lokal',
                        'Wisata Mancanegara' => 'Wisata Mancanegara',
                    ]),
            ])

            ->actions([
                Tables\Actions\EditAction::make()->label('Edit'),
                Tables\Actions\DeleteAction::make()->label('Hapus'),
            ])

            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Hapus yang dipilih'),
                ]),
            ]);
    }

    // ----------------------------------------------------------------
    // PAGES
    // ----------------------------------------------------------------
    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListJenisLayanans::route('/'),
            'create' => Pages\CreateJenisLayanan::route('/create'),
            'edit'   => Pages\EditJenisLayanan::route('/{record}/edit'),
        ];
    }
}