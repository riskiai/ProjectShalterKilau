<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKecamatanTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->char('id_kec', 6)->unique(); // Primary key dengan char(6)
            $table->char('id_kab', 4); // Relasi ke kabupaten dengan char(4)
            $table->string('nama', 255); // Nama kecamatan, menggunakan varchar(255) untuk fleksibilitas
            $table->timestamps();

            // Definisikan foreign key untuk id_kab
            $table->foreign('id_kab')->references('id_kab')->on('kabupaten')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kecamatan');
    }
}
