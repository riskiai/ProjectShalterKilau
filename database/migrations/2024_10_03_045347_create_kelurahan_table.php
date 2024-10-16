<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelurahanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kelurahan', function (Blueprint $table) {
            $table->char('id_kel', 10)->unique(); // Primary key dengan char(10)
            $table->char('id_kec', 6)->nullable(); // Relasi ke kecamatan dengan char(6)
            $table->string('nama', 255)->nullable(); // Nama kelurahan
            $table->unsignedInteger('id_jenis'); // Kolom tambahan sesuai dengan SQL
            $table->timestamps();

            // Definisikan foreign key untuk id_kec
            $table->foreign('id_kec')->references('id_kec')->on('kecamatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahan');
    }
}
