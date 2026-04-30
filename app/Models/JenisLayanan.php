<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class JenisLayanan extends Model
{
    protected $table = 'jenislayanans';

    protected $fillable = [
        'nama',
        'p_singkat',
        'deskripsi',
        'jenis_wisata',
        'harga',
        'durasi',
        'lokasi',
        'foto',
    ];

    protected static function booted(): void
    {
        static::deleting(function ($paket) {
            if ($paket->foto) {
                Storage::disk('public')->delete($paket->foto);
            }
        });
    }

    public function syaratKetentuan(): HasMany
    {
        return $this->hasMany(SyaratKetentuan::class, 'jenis_layanan_id')->orderBy('urutan');
    }
    
    public function fasilitas(): HasMany
    {
        return $this->hasMany(Fasilitas::class, 'jenis_layanan_id')->orderBy('urutan');
    }

    public function keunggulanPaket(): HasMany
    {
        return $this->hasMany(KeunggulanPaket::class, 'jenis_layanan_id')->orderBy('urutan');
    }

    public function itinerary(): HasMany
    {
        return $this->hasMany(Itinerary::class, 'jenis_layanan_id')->orderBy('hari');
    }
}