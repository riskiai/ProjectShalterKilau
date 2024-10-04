<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seeder untuk Admin Pusat
        DB::table('users')->insert([
            'username' => 'admin_pusat',
            'email' => 'admin_pusat@example.com',
            'password' => Hash::make('password123'),
            'level' => 'admin_pusat',
            'status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeder untuk Admin Cabang
        DB::table('users')->insert([
            'username' => 'admin_cabang',
            'email' => 'admin_cabang@example.com',
            'password' => Hash::make('password123'),
            'level' => 'admin_cabang',
            'status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Seeder untuk Admin Shelter
        DB::table('users')->insert([
            'username' => 'admin_shelter',
            'email' => 'admin_shelter@example.com',
            'password' => Hash::make('password123'),
            'level' => 'admin_shelter',
            'status' => 'Aktif',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
