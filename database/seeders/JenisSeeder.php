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
        // Masukkan data jenis administratif yang ada di Indonesia
        DB::table('jenis')->insert([
            ['nama' => 'kabupaten', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'kota', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'kelurahan', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'desa', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
