<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan beberapa contoh data kecamatan
        DB::table('kecamatan')->insert([
            ['id_kab' => 1, 'nama' => 'Kecamatan Bojongsoang', 'created_at' => now(), 'updated_at' => now()],
            ['id_kab' => 1, 'nama' => 'Kecamatan Cileunyi', 'created_at' => now(), 'updated_at' => now()],
            ['id_kab' => 2, 'nama' => 'Kecamatan Cimahi Utara', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
