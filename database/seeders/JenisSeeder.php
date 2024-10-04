<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan beberapa contoh data jenis
        DB::table('jenis')->insert([
            ['nama' => 'Kabupaten', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Kota', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
