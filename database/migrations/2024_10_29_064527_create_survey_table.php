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
        Schema::create('survey', function (Blueprint $table) {
            $table->bigIncrements('id_survey');
            $table->unsignedBigInteger('id_keluarga');
            $table->string('pekerjaan_kepala_keluarga', 255)->nullable();
            $table->string('penghasilan', 255)->nullable();
            $table->string('pendidikan_kepala_keluarga', 255)->nullable();
            $table->string('jumlah_tanggungan', 255)->nullable();
            $table->string('kepemilikan_tabungan', 255)->nullable();
            $table->string('jumlah_makan', 255)->nullable();
            $table->string('kepemilikan_tanah', 255)->nullable();
            $table->string('kepemilikan_rumah', 255)->nullable();
            $table->string('kondisi_rumah_dinding', 255)->nullable();
            $table->string('kondisi_rumah_lantai', 255)->nullable();
            $table->string('kepemilikan_kendaraan', 255)->nullable();
            $table->string('kepemilikan_elektronik', 255)->nullable();
            $table->string('sumber_air_bersih', 255)->nullable();
            $table->string('jamban_limbah', 255)->nullable();
            $table->string('tempat_sampah', 255)->nullable();
            $table->string('perokok', 255)->nullable();
            $table->string('konsumen_miras', 255)->nullable();
            $table->string('persediaan_p3k', 255)->nullable();
            $table->string('makan_buah_sayur', 255)->nullable();
            $table->string('solat_lima_waktu', 255)->nullable();
            $table->string('membaca_alquran', 255)->nullable();
            $table->string('majelis_taklim', 255)->nullable();
            $table->string('membaca_koran', 255)->nullable();
            $table->string('pengurus_organisasi', 255)->nullable();
            $table->string('pengurus_organisasi_sebagai', 255)->nullable();
            $table->string('status_anak', 255)->nullable();
            $table->string('biaya_pendidikan_perbulan', 255)->nullable();
            $table->string('bantuan_lembaga_formal_lain', 255)->nullable();
            $table->string('bantuan_lembaga_formal_lain_sebesar', 255)->nullable();
            $table->string('kondisi_penerima_manfaat', 255)->nullable();
            $table->string('tanggal_survey', 255)->nullable();
            $table->string('petugas_survey', 255)->nullable();
            $table->string('hasil_survey', 255)->nullable();
            $table->string('keterangan_hasil', 255)->nullable();
            $table->timestamps();

            // Foreign key relation to keluarga table
            $table->foreign('id_keluarga')->references('id_keluarga')->on('keluarga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey');
    }
};
