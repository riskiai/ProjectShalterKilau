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
        Schema::create('absen_user', function (Blueprint $table) {
            $table->bigIncrements('id_absen_user');
            $table->unsignedBigInteger('id_anak');
            $table->unsignedBigInteger('id_tutor');
            $table->timestamps();

            // Foreign key relations
            $table->foreign('id_anak')->references('id_anak')->on('anak')->onDelete('cascade');
            $table->foreign('id_tutor')->references('id_tutor')->on('tutor')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen_user');
    }
};
