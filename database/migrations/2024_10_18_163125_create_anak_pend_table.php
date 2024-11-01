<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnakPendTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anak_pend', function (Blueprint $table) {
            $table->bigIncrements('id_anak_pend');
            $table->unsignedBigInteger('id_keluarga');
            $table->string('jenjang'); // Contoh: SD, SMP, SMA, Universitas
            $table->string('kelas')->nullable(); // Kelas untuk sekolah dasar/menengah
            $table->string('nama_sekolah')->nullable(); // Nama sekolah untuk jenjang SD-SMA
            $table->text('alamat_sekolah')->nullable(); // Alamat sekolah
            $table->string('jurusan')->nullable(); // Jurusan untuk pendidikan tinggi
            $table->integer('semester')->nullable(); // Semester untuk universitas
            $table->string('nama_pt')->nullable(); // Nama perguruan tinggi
            $table->text('alamat_pt')->nullable(); // Alamat perguruan tinggi
            $table->timestamps();

            // Relasi ke tabel keluarga
            $table->foreign('id_keluarga')->references('id_keluarga')->on('keluarga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anak_pend');
    }
}
