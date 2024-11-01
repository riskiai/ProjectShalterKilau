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
        Schema::create('ibu', function (Blueprint $table) {
            $table->bigIncrements('id_ibu'); // Primary key
            $table->unsignedBigInteger('id_keluarga'); // Foreign key ke tabel keluarga
            $table->string('nik_ibu', 16); // Nomor Induk Kependudukan Ibu
            $table->string('nama_ibu'); // Nama lengkap Ibu
            $table->string('agama'); // Agama Ibu
            $table->string('tempat_lahir'); // Tempat lahir Ibu
            $table->date('tanggal_lahir'); // Tanggal lahir Ibu
            $table->text('alamat'); // Alamat Ibu
            $table->char('id_prov', 2); // Foreign key ke tabel provinsi
            $table->char('id_kab', 4); // Foreign key ke tabel kabupaten
            $table->char('id_kec', 6); // Foreign key ke tabel kecamatan
            $table->char('id_kel', 10); // Foreign key ke tabel kelurahan
            $table->decimal('penghasilan', 15, 2)->nullable(); // Penghasilan Ibu
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
        Schema::dropIfExists('ibu');
    }
};
