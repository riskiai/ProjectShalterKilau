<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminCabangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_cabang')->insert([
            'user_id' => 2, // User ID dari user admin_cabang
            'id_kacab' => 1, // Misalkan kacab pertama
            'nama_lengkap' => 'Admin Cabang',
            'alamat' => 'Jl. Cabang No. 1',
            'no_hp' => '08123456780',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
