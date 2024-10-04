<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminShelterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_shelter')->insert([
            'user_id' => 3, // User ID dari user admin_shelter
            'id_kacab' => 1, // Misalkan kacab pertama
            'id_wilbin' => 1, // Misalkan wilbin pertama
            'id_shelter' => 1, // Misalkan shelter pertama
            'nama_lengkap' => 'Admin Shelter',
            'alamat_adm' => 'Jl. Shelter No. 1',
            'no_hp' => '08123456781',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
