<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShelterTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shelter', function (Blueprint $table) {
            $table->id('id_shelter'); // Primary key
            $table->string('nama_shelter'); // Nama Shelter
            $table->string('nama_kordinator'); // Nama Kordinator
            $table->string('no_telpon'); // Nomor telepon
            $table->text('alamat'); // Alamat shelter
            $table->unsignedBigInteger('id_wilbin');
            $table->timestamps();

            // Definisikan foreign key secara eksplisit
            $table->foreign('id_wilbin')->references('id_wilbin')->on('wilbin')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shelter');
    }
}
