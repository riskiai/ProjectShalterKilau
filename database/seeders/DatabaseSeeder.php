<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AdminPusatSeeder::class,
            AdminCabangSeeder::class,
            AdminShelterSeeder::class,
            ProvinsiSeeder::class,
            JenisSeeder::class,
            KabupatenSeeder::class,
            KecamatanSeeder::class,
            KelurahanSeeder::class,
            KacabSeeder::class,
            AdminCabangSeeder::class,
            WilbinSeeder::class,
            ShelterSeeder::class,
        ]);
    }
}
