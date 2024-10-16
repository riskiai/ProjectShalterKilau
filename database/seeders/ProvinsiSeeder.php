<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('seeders/provinsi.sql');
        DB::unprepared(file_get_contents($path));
    }
}
