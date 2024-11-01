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
        Schema::create('kelompok', function (Blueprint $table) {
            $table->bigIncrements('id_kelompok'); // Primary key
            $table->unsignedBigInteger('id_shelter'); // Foreign key ke tabel shelter
            $table->unsignedBigInteger('id_level_anak_binaan'); // Foreign key ke tabel level_as_anak_binaan
            $table->string('nama_kelompok'); // Nama kelompok
            $table->integer('jumlah_anggota'); // Jumlah anggota
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_shelter')->references('id_shelter')->on('shelter')->onDelete('cascade');
            $table->foreign('id_level_anak_binaan')->references('id_level_anak_binaan')->on('level_as_anak_binaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompok');
    }
};
