<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Filament\Resources\JenisLayananResource\Pages;
use App\Models\JenisLayanan;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

class JenisLayananResource extends Resource
{
    protected static ?string $model = JenisLayanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Jenis Layanan';

    protected static ?string $modelLabel = 'Jenis Layanan';
    
    protected static ?string $pluralModelLabel = 'Jenis Layanan';

    public static function form(Form $form): Form
    {
        return $form->schema([

            TextInput::make('nama')
                ->label('Nama paket')
                ->unique(ignoreRecord: true)
                ->required(),

            Textarea::make('p_singkat')
                ->label('Penjelasan singkat')
                ->rows(3)
                ->required(),

            Select::make('jenis_wisata')
                ->label('Jenis wisata')
                ->options([
                    'Wisata Religi'      => 'Wisata Religi',
                    'Wisata Lokal'       => 'Wisata Lokal',
                    'Wisata Mancanegara' => 'Wisata Mancanegara',
                ])
                ->required(),

            TextInput::make('harga')
                ->label('Harga')
                ->numeric()
                ->prefix('Rp')
                ->required(),

            TextInput::make('durasi')
                ->label('Durasi')
                ->required(),

            TextInput::make('lokasi')
                ->label('Lokasi')
                ->required(),

            FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->directory('foto-paket')
                ->nullable()
                ->columnSpanFull(),

            Repeater::make('syaratKetentuan')
                ->label('Syarat & Ketentuan')
                ->relationship()
                ->schema([
                    TextInput::make('isi')
                        ->label('Poin syarat')
                        ->required(),
                    TextInput::make('urutan')
                        ->label('Urutan')
                        ->numeric()
                        ->default(null),
                ])
                ->orderColumn('urutan')
                ->addActionLabel('+ Tambah poin')
                ->collapsible()
                ->columnSpanFull(),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([

            ImageColumn::make('foto')
                ->label('Foto')
                ->circular(),

            TextColumn::make('nama')
                ->label('Nama paket')
                ->searchable(),

            TextColumn::make('jenis_wisata')
                ->label('Jenis wisata')
                ->badge(),

            TextColumn::make('harga')
                ->label('Harga')
                ->money('IDR'),

            TextColumn::make('durasi')
                ->label('Durasi'),

            TextColumn::make('lokasi')
                ->label('Lokasi'),

        ]);
        
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListJenisLayanans::route('/'),
            'create' => Pages\CreateJenisLayanan::route('/create'),
            'edit'   => Pages\EditJenisLayanan::route('/{record}/edit'),
        ];
    }
}