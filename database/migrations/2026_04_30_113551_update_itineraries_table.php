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
        Schema::table('itineraries', function (Blueprint $table) {
        $table->dropColumn('deskripsi');
        $table->dropColumn('urutan');
    });

    Schema::table('itineraries', function (Blueprint $table) {
        $table->renameColumn('judul', 'deskripsi');
        $table->integer('hari')->change();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('itineraries', function (Blueprint $table) {
        $table->renameColumn('deskripsi', 'judul');
        $table->string('hari')->change();
        $table->text('deskripsi')->nullable();
        $table->unsignedInteger('urutan')->nullable();
    });
    }
};
