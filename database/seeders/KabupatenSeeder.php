<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan beberapa contoh data kabupaten
        DB::table('kabupaten')->insert([
            ['id_prov' => 1, 'id_jenis' => 1, 'nama' => 'Bandung', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 1, 'id_jenis' => 2, 'nama' => 'Cimahi', 'created_at' => now(), 'updated_at' => now()],
            ['id_prov' => 2, 'id_jenis' => 1, 'nama' => 'Semarang', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
