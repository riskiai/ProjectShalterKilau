<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKacabTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kacab', function (Blueprint $table) {
            $table->id('id_kacab'); // Primary key
            $table->string('nama_kacab');
            $table->string('no_telpon');
            $table->text('alamat');
            
            // Kolom dengan tipe data yang disesuaikan dengan tabel referensi
            $table->char('id_prov', 2); 
            $table->char('id_kab', 4);
            $table->char('id_kec', 6);
            $table->char('id_kel', 10);
            
            $table->timestamps();

            // Definisikan foreign key
            $table->foreign('id_prov')->references('id_prov')->on('provinsi')->onDelete('cascade');
            $table->foreign('id_kab')->references('id_kab')->on('kabupaten')->onDelete('cascade');
            $table->foreign('id_kec')->references('id_kec')->on('kecamatan')->onDelete('cascade');
            $table->foreign('id_kel')->references('id_kel')->on('kelurahan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kacab');
    }
}
