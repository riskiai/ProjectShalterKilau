<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminPusatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_pusat')->insert([
            'user_id' => 1, // User ID dari user admin_pusat
            'nama_lengkap' => 'Admin Pusat',
            'alamat' => 'Jl. Pusat No. 1',
            'no_hp' => '08123456789',
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
