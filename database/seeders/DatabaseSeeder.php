<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call([
        //     UserSeeder::class,
        //     AdminPusatSeeder::class,
        //     AdminCabangSeeder::class,
        //     AdminShelterSeeder::class,
        //     ProvinsiSeeder::class,
        //     JenisSeeder::class,
        //     KabupatenSeeder::class,
        //     KecamatanSeeder::class,
        //     KelurahanSeeder::class,
        //     KacabSeeder::class,
        //     AdminCabangSeeder::class,
        //     WilbinSeeder::class,
        //     ShelterSeeder::class,
        // ]);

        DB::unprepared(file_get_contents(database_path('seeders/kecamatan.sql')));
    }
}
