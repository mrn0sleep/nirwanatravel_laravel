<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembelian extends Model
{
    protected $table = 'pembelian';

    protected $fillable = [
        'jenislayanan_id',
        'nama_pembeli',
        'nomor_hp',
        'jadwal',
        'status',
    ];

    public function jenislayanan(): BelongsTo
    {
        return $this->belongsTo(JenisLayanan::class);
    }
}