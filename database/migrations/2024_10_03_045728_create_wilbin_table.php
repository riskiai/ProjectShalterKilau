<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWilbinTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('wilbin', function (Blueprint $table) {
            $table->id('id_wilbin'); // Primary key
            $table->string('nama_wilbin'); // Nama Wilbin
            $table->unsignedBigInteger('id_kacab');
            $table->timestamps();

            // Definisikan foreign key secara eksplisit
            $table->foreign('id_kacab')->references('id_kacab')->on('kacab')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilbin');
    }
}
