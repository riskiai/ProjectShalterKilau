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
        Schema::create('berita', function (Blueprint $table) {
            $table->id('id_berita'); // Primary key sesuai dengan field id_berita
            $table->string('judul'); // Field untuk judul berita
            $table->string('foto')->nullable(); // Field untuk foto utama, bisa kosong
            $table->string('foto2')->nullable(); // Field untuk foto tambahan 1, bisa kosong
            $table->string('foto3')->nullable(); // Field untuk foto tambahan 2, bisa kosong
            $table->text('konten'); // Field untuk konten berita
            $table->date('tanggal'); // Field untuk tanggal berita
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
