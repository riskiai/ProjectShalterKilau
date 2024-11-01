<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminShelterTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_shelter', function (Blueprint $table) {
            $table->id('id_admin_shelter'); // Primary key
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_kacab');
            $table->unsignedBigInteger('id_wilbin');
            $table->unsignedBigInteger('id_shelter');
            $table->string('nama_lengkap'); // Nama lengkap admin shelter
            $table->text('alamat_adm'); // Alamat admin shelter
            $table->string('no_hp'); // Nomor telepon admin shelter
            $table->string('foto')->nullable(); // Foto opsional
            $table->timestamps();

            // Definisikan foreign key secara eksplisit
            $table->foreign('user_id')->references('id_users')->on('users')->onDelete('cascade');
            $table->foreign('id_kacab')->references('id_kacab')->on('kacab')->onDelete('cascade');
            $table->foreign('id_wilbin')->references('id_wilbin')->on('wilbin')->onDelete('cascade');
            $table->foreign('id_shelter')->references('id_shelter')->on('shelter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_shelter');
    }
}
