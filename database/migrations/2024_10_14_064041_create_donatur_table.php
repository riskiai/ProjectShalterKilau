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
        Schema::create('donatur', function (Blueprint $table) {
            $table->bigIncrements('id_donatur');
            $table->unsignedBigInteger('id_users'); // Relasi ke tabel users
            $table->unsignedBigInteger('id_kacab'); // Relasi ke tabel kacab
            $table->unsignedBigInteger('id_wilbin'); // Relasi ke tabel wilbin
            $table->unsignedBigInteger('id_shelter'); // Relasi ke tabel shelter
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->string('no_hp');
            $table->unsignedBigInteger('id_bank'); // Relasi ke tabel bank
            $table->string('no_rekening');
            $table->string('foto')->nullable(); // Kolom foto bisa kosong
            $table->string('diperuntukan'); // Deskripsi untuk apa donasi ini diperuntukan (misal: pendidikan, kesehatan, dll)
            $table->timestamps();

            // Foreign key relations
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kacab')->references('id_kacab')->on('kacab')->onDelete('cascade');
            $table->foreign('id_wilbin')->references('id_wilbin')->on('wilbin')->onDelete('cascade');
            $table->foreign('id_shelter')->references('id_shelter')->on('shelter')->onDelete('cascade');
            $table->foreign('id_bank')->references('id_bank')->on('bank')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donatur');
    }
};
