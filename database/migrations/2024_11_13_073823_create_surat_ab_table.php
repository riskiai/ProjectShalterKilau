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
        // Hapus tabel jika sudah ada
        Schema::dropIfExists('surat_ab');

        Schema::create('surat_ab', function (Blueprint $table) {
            $table->bigIncrements('id_surat'); // Primary key
            $table->unsignedBigInteger('id_anak'); // Foreign key to 'anak' table
            $table->text('pesan'); // Pesan field for text messages
            $table->string('foto')->nullable(); // Foto field, can be nullable
            $table->date('tanggal'); // Date field for message date
            $table->enum('is_read', ['ya', 'tidak'])->default('tidak'); // Enum for read status, default to 'tidak'
            $table->timestamps(); // Timestamps for created_at and updated_at

            // Foreign key relation to 'anak' table
            $table->foreign('id_anak')->references('id_anak')->on('anak')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_ab');
    }
};
