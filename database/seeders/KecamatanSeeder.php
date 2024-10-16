<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('seeders/kecamatan.sql');
        DB::unprepared(file_get_contents($path));
    }
}
