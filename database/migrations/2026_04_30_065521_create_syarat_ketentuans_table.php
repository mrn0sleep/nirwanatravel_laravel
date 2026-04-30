<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('syarat_ketentuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_layanan_id')
                  ->constrained('jenislayanans')
                  ->cascadeOnDelete();
            $table->string('isi');
            $table->unsignedInteger('urutan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('syarat_ketentuans');
    }
};