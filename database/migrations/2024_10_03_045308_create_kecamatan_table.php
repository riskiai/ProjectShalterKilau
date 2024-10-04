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
            $table->id('id_kec'); // Primary key
            $table->unsignedBigInteger('id_kab');
            $table->string('nama'); // Nama kecamatan
            $table->timestamps();

            // Definisikan foreign key secara eksplisit
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
