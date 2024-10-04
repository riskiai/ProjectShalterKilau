<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilbinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan beberapa contoh data wilbin
        DB::table('wilbin')->insert([
            [
                'nama_wilbin' => 'Wilbin Bandung Utara',
                'id_kacab' => 1, // Kacab Bandung
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_wilbin' => 'Wilbin Surabaya Selatan',
                'id_kacab' => 2, // Kacab Surabaya
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
