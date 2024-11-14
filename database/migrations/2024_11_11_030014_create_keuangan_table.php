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
        // Hapus tabel jika sudah ada
        Schema::dropIfExists('keuangan');

        Schema::create('keuangan', function (Blueprint $table) {
            $table->bigIncrements('id_keuangan');
            $table->unsignedBigInteger('id_anak'); // Foreign key untuk tabel anak
            $table->string('tingkat_sekolah');
            $table->string('semester');
            $table->string('bimbel')->nullable();
            $table->string('eskul_dan_keagamaan')->nullable();
            $table->string('laporan')->nullable();
            $table->string('uang_tunai')->nullable();
            $table->string('donasi')->nullable();
            $table->string('subsidi_infak')->nullable();
            $table->timestamps();

            // Foreign key relations
            $table->foreign('id_anak')->references('id_anak')->on('anak')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangan');
    }
};
