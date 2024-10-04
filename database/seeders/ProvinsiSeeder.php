<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan beberapa contoh data provinsi
        DB::table('provinsi')->insert([
            ['nama' => 'Jawa Barat', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Jawa Tengah', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Jawa Timur', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
