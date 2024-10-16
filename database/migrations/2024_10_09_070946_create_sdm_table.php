<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSdmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sdm', function (Blueprint $table) {
            $table->id('id_sdm');
            $table->string('nik')->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->text('alamat');
            $table->string('pendidikan');
            $table->date('tgl_gabung');
            $table->date('tgl_keluar')->nullable();
            $table->string('no_telp');
            $table->string('email')->unique();
            $table->string('keaktifan_edu')->nullable();
            $table->text('keterangan')->nullable();

            // Kolom yang disesuaikan untuk foreign keys
            $table->char('id_prov', 2); 
            $table->char('id_kab', 4); 
            $table->char('id_kec', 6); 
            $table->char('id_kel', 10); 

            $table->unsignedBigInteger('id_struktur')->nullable();
            $table->unsignedBigInteger('id_wilbin')->nullable();
            $table->unsignedBigInteger('id_kacab');
            $table->timestamps();

            // Definisikan foreign key untuk masing-masing kolom
            $table->foreign('id_prov')->references('id_prov')->on('provinsi')->onDelete('cascade');
            $table->foreign('id_kab')->references('id_kab')->on('kabupaten')->onDelete('cascade');
            $table->foreign('id_kec')->references('id_kec')->on('kecamatan')->onDelete('cascade');
            $table->foreign('id_kel')->references('id_kel')->on('kelurahan')->onDelete('cascade');

            $table->foreign('id_struktur')->references('id_struktur')->on('struktur')->onDelete('set null');
            $table->foreign('id_wilbin')->references('id_wilbin')->on('wilbin')->onDelete('set null');
            $table->foreign('id_kacab')->references('id_kacab')->on('kacab')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sdm');
    }
}
