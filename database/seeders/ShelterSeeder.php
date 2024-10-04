<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShelterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan beberapa contoh data shelter
        DB::table('shelter')->insert([
            [
                'nama_shelter' => 'Shelter Bandung Utara',
                'nama_kordinator' => 'Kordinator Bandung Utara',
                'no_telpon' => '08123456789',
                'alamat' => 'Jl. Shelter Bandung Utara No. 1',
                'id_wilbin' => 1, // Wilbin Bandung Utara
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_shelter' => 'Shelter Surabaya Selatan',
                'nama_kordinator' => 'Kordinator Surabaya Selatan',
                'no_telpon' => '08123456780',
                'alamat' => 'Jl. Shelter Surabaya Selatan No. 2',
                'id_wilbin' => 2, // Wilbin Surabaya Selatan
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
