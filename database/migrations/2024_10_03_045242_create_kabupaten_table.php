<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKabupatenTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kabupaten', function (Blueprint $table) {
            $table->char('id_kab', 4)->unique(); // Ubah jadi unique
            $table->char('id_prov', 2); // Relasi ke provinsi dengan char(2)
            $table->string('nama', 255); // Nama kabupaten
            $table->integer('id_jenis')->unsigned(); // Jenis ID dengan tipe integer
            $table->timestamps();

            // Definisikan foreign key secara eksplisit
            $table->foreign('id_prov')->references('id_prov')->on('provinsi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabupaten');
    }
}
