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
            $table->id('id_kel'); // Primary key
            $table->unsignedBigInteger('id_kec');
            $table->string('nama'); // Nama kelurahan
            $table->timestamps();

            // Definisikan foreign key secara eksplisit
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
