<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenislayanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->text('p_singkat');
            $table->enum('jenis_wisata', ['Wisata Religi', 'Wisata Lokal', 'Wisata Mancanegara']);
            $table->unsignedBigInteger('harga');
            $table->string('durasi');
            $table->string('lokasi');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenislayanans');
    }
};