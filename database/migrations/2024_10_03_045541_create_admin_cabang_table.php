<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminCabangTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_cabang', function (Blueprint $table) {
            $table->id('id_admin_cabang'); // Primary key custom
            $table->unsignedBigInteger('user_id'); // Relasi ke tabel users
            $table->unsignedBigInteger('id_kacab'); // Definisikan sebagai unsignedBigInteger karena foreign key
            $table->string('nama_lengkap'); // Nama lengkap admin cabang
            $table->text('alamat'); // Alamat admin cabang
            $table->string('no_hp'); // Nomor telepon
            $table->string('foto')->nullable(); // Foto opsional
            $table->timestamps();

            // Definisikan foreign key secara eksplisit ke kolom id_kacab
            $table->foreign('user_id')->references('id_users')->on('users')->onDelete('cascade');
            $table->foreign('id_kacab')->references('id_kacab')->on('kacab')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_cabang');
    }
}
