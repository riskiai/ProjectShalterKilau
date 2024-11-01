<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPusatTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('admin_pusat', function (Blueprint $table) {
            $table->id('id_admin_pusat');
            $table->unsignedBigInteger('id_users');
            $table->string('nama_lengkap');
            $table->text('alamat');
            $table->string('no_hp');
            $table->string('foto')->nullable(); 
            $table->timestamps();

            // Foreign key relations
            $table->foreign('id_users')->references('id_users')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_pusat');
    }
};
