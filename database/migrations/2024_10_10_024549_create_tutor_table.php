<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTutorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutor', function (Blueprint $table) {
            $table->bigIncrements('id_tutor');
            $table->string('nama');
            $table->string('pendidikan');
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->unsignedBigInteger('id_kacab');
            $table->unsignedBigInteger('id_wilbin');
            $table->unsignedBigInteger('id_shelter');
            $table->string('maple'); // Ini mungkin bisa diubah sesuai kebutuhan jika ada deskripsi lebih detail tentang 'maple'
            $table->string('foto')->nullable();
            // $table->enum('status', ['aktif', 'non-aktif']);
            $table->timestamps();

            // Foreign key relations
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
        Schema::dropIfExists('tutor');
    }
}
