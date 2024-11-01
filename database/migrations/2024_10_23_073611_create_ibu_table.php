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
        // Hapus tabel ibu jika sudah ada
        Schema::dropIfExists('ibu');

        // Buat tabel ibu yang baru dengan kolom-kolom yang nullable
        Schema::create('ibu', function (Blueprint $table) {
            $table->bigIncrements('id_ibu'); // Primary key
            $table->unsignedBigInteger('id_keluarga'); // Foreign key ke tabel keluarga
            $table->string('nik_ibu', 16)->nullable(); // Nomor Induk Kependudukan Ibu
            $table->string('nama_ibu')->nullable(); // Nama lengkap Ibu
            $table->string('agama')->nullable(); // Agama Ibu
            $table->string('tempat_lahir')->nullable(); // Tempat lahir Ibu
            $table->date('tanggal_lahir')->nullable(); // Tanggal lahir Ibu
            $table->text('alamat')->nullable(); // Alamat Ibu
            $table->char('id_prov', 2)->nullable(); // Foreign key ke tabel provinsi, nullable
            $table->char('id_kab', 4)->nullable(); // Foreign key ke tabel kabupaten, nullable
            $table->char('id_kec', 6)->nullable(); // Foreign key ke tabel kecamatan, nullable
            $table->char('id_kel', 10)->nullable(); // Foreign key ke tabel kelurahan, nullable
            $table->string('penghasilan')->nullable();
            $table->date('tanggal_kematian')->nullable(); // Tanggal kematian Ibu
            $table->string('penyebab_kematian')->nullable(); // Penyebab kematian Ibu
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
        // Hapus tabel ibu jika migrasi di-rollback
        Schema::dropIfExists('ibu');
    }
};
