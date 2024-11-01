<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->bigIncrements('id_keluarga');
            $table->unsignedBigInteger('id_kacab');
            $table->unsignedBigInteger('id_wilbin');
            $table->unsignedBigInteger('id_shelter');
            $table->string('no_kk', 20)->unique();
            $table->string('kepala_keluarga');
            $table->enum('status_ortu', ['ayah', 'ibu', 'wali']);
            $table->unsignedBigInteger('id_bank')->nullable();
            $table->string('no_rek')->nullable();
            $table->string('an_rek')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('an_tlp')->nullable();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_kacab')->references('id_kacab')->on('kacab')->onDelete('cascade');
            $table->foreign('id_wilbin')->references('id_wilbin')->on('wilbin')->onDelete('cascade');
            $table->foreign('id_shelter')->references('id_shelter')->on('shelter')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keluarga');
    }
}
