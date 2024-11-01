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
        // Hapus tabel ayah jika sudah ada
        Schema::dropIfExists('ayah');

        // Buat tabel ayah yang baru
        Schema::create('ayah', function (Blueprint $table) {
            $table->bigIncrements('id_ayah'); // Primary key
            $table->unsignedBigInteger('id_keluarga'); // Foreign key ke tabel keluarga
            $table->string('nik_ayah', 16)->nullable(); // Nomor Induk Kependudukan Ayah
            $table->string('nama_ayah')->nullable(); // Nama lengkap Ayah
            $table->string('agama')->nullable(); // Agama Ayah
            $table->string('tempat_lahir')->nullable(); // Tempat lahir Ayah
            $table->date('tanggal_lahir')->nullable(); // Tanggal lahir Ayah
            $table->text('alamat')->nullable(); // Alamat Ayah
            $table->char('id_prov', 2)->nullable(); // Foreign key ke tabel provinsi, nullable
            $table->char('id_kab', 4)->nullable(); // Foreign key ke tabel kabupaten, nullable
            $table->char('id_kec', 6)->nullable(); // Foreign key ke tabel kecamatan, nullable
            $table->char('id_kel', 10)->nullable(); // Foreign key ke tabel kelurahan, nullable
            $table->decimal('penghasilan', 15, 2)->nullable(); // Penghasilan Ayah
            $table->date('tanggal_kematian')->nullable(); // Tanggal kematian Ayah
            $table->string('penyebab_kematian')->nullable(); // Penyebab kematian Ayah
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_keluarga')->references('id_keluarga')->on('keluarga')->onDelete('cascade');
            $table->foreign('id_prov')->references('id_prov')->on('provinsi')->onDelete('restrict');
            $table->foreign('id_kab')->references('id_kab')->on('kabupaten')->onDelete('restrict');
            $table->foreign('id_kec')->references('id_kec')->on('kecamatan')->onDelete('restrict');
            $table->foreign('id_kel')->references('id_kel')->on('kelurahan')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus tabel ayah jika migrasi di-roll back
        Schema::dropIfExists('ayah');
    }
};
