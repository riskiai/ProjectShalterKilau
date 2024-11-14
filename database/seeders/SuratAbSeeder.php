<?php

namespace Database\Seeders;

use App\Models\Anak;
use App\Models\SuratAb;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class SuratAbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        // Path gambar asal di public folder
        $sourceImagePath = public_path('assets/img/kilau1.png');

        // Cek apakah file sumber ada
        if (!file_exists($sourceImagePath)) {
            echo "Gambar tidak ditemukan: assets/img/kilau1.png\n";
            return;
        }

        // Ambil semua data anak untuk digunakan sebagai foreign key di surat_ab
        $anakList = Anak::all();

        foreach ($anakList as $anak) {
            // Generate nama file unik untuk setiap anak
            $fileName = 'Surat/' . Str::uuid() . '.png';
            
            // Salin gambar ke folder storage/app/public/Surat
            Storage::disk('public')->put($fileName, file_get_contents($sourceImagePath));

            // Simpan data ke dalam tabel surat_ab dengan path yang mengarah ke storage
            SuratAb::create([
                'id_anak' => $anak->id_anak,
                'pesan' => $faker->sentence(10), // Pesan acak dengan 10 kata
                'foto' => 'storage/' . $fileName, // Path untuk foto di storage
                'tanggal' => $faker->date(), // Tanggal acak
                'is_read' => $faker->randomElement(['ya', 'tidak']), // Status baca acak
            ]);
        }
    }
}
