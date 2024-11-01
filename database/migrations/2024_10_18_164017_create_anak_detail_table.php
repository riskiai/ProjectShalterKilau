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
        Schema::create('anak_detail', function (Blueprint $table) {
            $table->bigIncrements('id_anak_detail'); // Primary key
            $table->unsignedBigInteger('id_quran'); // Foreign key ke tabel al_quran
            $table->string('tahfidz'); // Informasi tahfidz (hafalan)
            $table->timestamps();

            // Relasi ke tabel al_quran
            $table->foreign('id_quran')->references('id_quran')->on('al_quran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak_detail');
    }
};
