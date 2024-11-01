<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateStatusOrtuColumnInKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('keluarga', function (Blueprint $table) {
            // Ubah kolom status_ortu dari enum menjadi string
            $table->string('status_ortu')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('keluarga', function (Blueprint $table) {
            // Kembalikan kolom status_ortu menjadi enum jika rollback
            $table->enum('status_ortu', ['ayah', 'ibu', 'wali'])->change();
        });
    }
}
