<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SyaratKetentuan extends Model
{
    protected $table = 'syarat_ketentuans';

    protected $fillable = [
        'jenis_layanan_id',
        'isi',
        'urutan',
    ];

    public function jenisLayanan(): BelongsTo
    {
        return $this->belongsTo(JenisLayanan::class, 'jenis_layanan_id');
    }
}