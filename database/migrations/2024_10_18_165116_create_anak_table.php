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
        Schema::create('anak', function (Blueprint $table) {
            $table->bigIncrements('id_anak'); // Primary key
            $table->unsignedBigInteger('id_keluarga'); // Foreign key ke tabel keluarga
            $table->unsignedBigInteger('id_anak_pend')->nullable(); // Foreign key ke tabel anak_pend
            $table->unsignedBigInteger('id_kelompok')->nullable(); // Foreign key ke tabel kelompok
            $table->unsignedBigInteger('id_shelter'); // Foreign key ke tabel shelter
            $table->unsignedBigInteger('id_donatur')->nullable(); // Foreign key ke tabel donatur
            $table->unsignedBigInteger('id_level_anak_binaan')->nullable(); // Foreign key ke tabel level_as_anak_binaan
            $table->string('nik_anak', 16); // Nomor Induk Kependudukan anak
            $table->integer('anak_ke'); // Anak ke berapa
            $table->integer('dari_bersaudara'); // Dari berapa bersaudara
            $table->string('nick_name'); // Nama panggilan anak
            $table->string('full_name'); // Nama lengkap anak
            $table->string('agama'); // Agama anak
            $table->string('tempat_lahir'); // Tempat lahir anak
            $table->date('tanggal_lahir'); // Tanggal lahir anak
            $table->string('jenis_kelamin', 20); // Jenis kelamin anak
            $table->string('tinggal_bersama'); // Tinggal bersama siapa
            $table->string('status_validasi')->nullable(); // Status validasi
            $table->string('status_cpb')->nullable(); // Status CPB
            $table->string('jenis_anak_binaan')->nullable(); // Jenis anak binaan
            $table->string('hafalan')->nullable(); // Hafalan anak
            $table->string('pelajaran_favorit')->nullable(); // Pelajaran favorit anak
            $table->string('hobi')->nullable(); // Hobi anak
            $table->string('prestasi')->nullable(); // Prestasi anak
            $table->integer('jarak_rumah')->nullable(); // Jarak rumah anak ke shelter
            $table->string('transportasi')->nullable(); // Transportasi yang digunakan anak
            $table->string('foto')->nullable(); // Foto anak
            $table->string('status')->nullable(); // Status anak
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_keluarga')->references('id_keluarga')->on('keluarga')->onDelete('cascade');
            $table->foreign('id_anak_pend')->references('id_anak_pend')->on('anak_pend')->onDelete('cascade');
            $table->foreign('id_kelompok')->references('id_kelompok')->on('kelompok')->onDelete('cascade');
            $table->foreign('id_shelter')->references('id_shelter')->on('shelter')->onDelete('cascade');
            $table->foreign('id_donatur')->references('id_donatur')->on('donatur')->onDelete('cascade');
            $table->foreign('id_level_anak_binaan')->references('id_level_anak_binaan')->on('level_as_anak_binaan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak');
    }
};
