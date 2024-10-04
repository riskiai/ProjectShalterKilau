<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan beberapa contoh data kelurahan
        DB::table('kelurahan')->insert([
            ['id_kec' => 1, 'nama' => 'Kelurahan Buah Batu', 'created_at' => now(), 'updated_at' => now()],
            ['id_kec' => 2, 'nama' => 'Kelurahan Margahayu', 'created_at' => now(), 'updated_at' => now()],
            ['id_kec' => 3, 'nama' => 'Kelurahan Cibabat', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
