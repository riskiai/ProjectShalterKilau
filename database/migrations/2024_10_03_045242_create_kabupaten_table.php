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
            $table->id('id_kab'); // Primary key
            $table->unsignedBigInteger('id_prov');
            $table->unsignedBigInteger('id_jenis');
            $table->string('nama'); // Nama kabupaten
            $table->timestamps();

            // Definisikan foreign key secara eksplisit
            $table->foreign('id_prov')->references('id_prov')->on('provinsi')->onDelete('cascade');
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis')->onDelete('cascade');
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
