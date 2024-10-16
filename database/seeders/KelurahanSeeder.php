<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelurahanSeeder extends Seeder
{
    public function run()
    {
        $path = database_path('seeders/kelurahan.sql');
        DB::unprepared(file_get_contents($path));
    }
}
