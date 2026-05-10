<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembelianResource\Pages;
use App\Models\Pembelian;
use App\Models\JenisLayanan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PembelianResource extends Resource
{
    protected static ?string $model = Pembelian::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Pembelian';
    protected static ?string $title = 'Data Pembelian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jenislayanan_id')
                    ->label('Paket Wisata')
                    ->options(JenisLayanan::all()->pluck('nama', 'id'))
                    ->searchable()
                    ->required()
                    ->validationMessages([
                        'required' => 'Paket wisata wajib dipilih.',
                    ]),

                Forms\Components\TextInput::make('nama_pembeli')
                    ->label('Nama Pembeli')
                    ->required()
                    ->maxLength(40)
                    ->minLength(3)
                    ->validationMessages([
                        'required' => 'Nama pembeli wajib diisi.',
                        'min' => 'Nama minimal 3 karakter.',
                        'max' => 'Nama maksimal 40 karakter.',
                    ]),

                Forms\Components\TextInput::make('nomor_hp')
                    ->label('Nomor HP')
                    ->required()
                    ->tel()
                    ->minLength(10)
                    ->maxLength(15)
                    ->regex('/^[0-9+]+$/')
                    ->validationMessages([
                        'required' => 'Nomor HP wajib diisi.',
                        'min' => 'Nomor HP minimal 10 digit.',
                        'max' => 'Nomor HP maksimal 15 digit.',
                        'regex' => 'Nomor HP hanya boleh berisi angka.',
                    ]),

                Forms\Components\DatePicker::make('jadwal')
                    ->label('Jadwal')
                    ->required()
                    ->minDate(now())
                    ->validationMessages([
                        'required' => 'Jadwal wajib diisi.',
                        'min' => 'Jadwal tidak boleh kurang dari hari ini.',
                    ]),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'Belum Bayar' => 'Belum Bayar',
                        'Sudah Bayar' => 'Sudah Bayar',
                        'Selesai' => 'Selesai',
                    ])
                    ->default('Belum Bayar')
                    ->required()
                    ->validationMessages([
                        'required' => 'Status wajib dipilih.',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenislayanan.nama')
                    ->label('Paket Wisata')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_pembeli')
                    ->label('Nama Pembeli')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nomor_hp')
                    ->label('Nomor HP'),

                Tables\Columns\TextColumn::make('jadwal')
                    ->label('Jadwal')
                    ->date('d M Y')
                    ->sortable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'danger' => 'Belum Bayar',
                        'warning' => 'Sudah Bayar',
                        'success' => 'Selesai',
                    ]),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Belum Bayar' => 'Belum Bayar',
                        'Sudah Bayar' => 'Sudah Bayar',
                        'Selesai' => 'Selesai',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembelians::route('/'),
            'create' => Pages\CreatePembelian::route('/create'),
            'edit' => Pages\EditPembelian::route('/{record}/edit'),
        ];
    }
}