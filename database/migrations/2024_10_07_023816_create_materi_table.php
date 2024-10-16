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
        Schema::create('materi', function (Blueprint $table) {
            $table->bigIncrements('id_materi');
            $table->unsignedBigInteger('id_level_anak_binaan');
            $table->string('mata_pelajaran', 255);
            $table->string('nama_materi', 255);
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('id_level_anak_binaan')
                  ->references('id_level_anak_binaan')
                  ->on('level_as_anak_binaan')
                  ->onDelete('cascade'); // Optional: 'cascade' will delete materi if the related level_anak_binaan is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
