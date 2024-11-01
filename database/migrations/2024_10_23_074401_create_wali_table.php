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
        // Drop existing wali table if it exists
        Schema::dropIfExists('wali');

        Schema::create('wali', function (Blueprint $table) {
            $table->bigIncrements('id_wali'); // Primary key
            $table->unsignedBigInteger('id_keluarga'); // Foreign key ke tabel keluarga
            $table->string('nik_wali', 16)->nullable(); // Nomor Induk Kependudukan Wali
            $table->string('nama_wali')->nullable(); // Nama lengkap Wali
            $table->string('agama')->nullable(); // Agama Wali
            $table->string('tempat_lahir')->nullable(); // Tempat lahir Wali
            $table->date('tanggal_lahir')->nullable(); // Tanggal lahir Wali
            $table->text('alamat')->nullable(); // Alamat Wali
            $table->char('id_prov', 2)->nullable(); // Foreign key ke tabel provinsi
            $table->char('id_kab', 4)->nullable(); // Foreign key ke tabel kabupaten
            $table->char('id_kec', 6)->nullable(); // Foreign key ke tabel kecamatan
            $table->char('id_kel', 10)->nullable(); // Foreign key ke tabel kelurahan
            $table->string('penghasilan')->nullable();
            $table->string('hub_kerabat')->nullable(); // Hubungan kerabat Wali
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
        // Drop the wali table if it exists
        Schema::dropIfExists('wali');
    }
};
