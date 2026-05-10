<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('pembelian', function (Blueprint $table) {
        $table->id();
        $table->foreignId('jenislayanan_id')->constrained('jenislayanans')->onDelete('cascade');
        $table->string('nama_pembeli');
        $table->string('nomor_hp');
        $table->date('jadwal');
        $table->enum('status', ['Belum Bayar', 'Sudah Bayar', 'Selesai'])->default('Belum Bayar');
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('pembelian');
}
};
