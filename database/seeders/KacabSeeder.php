<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KacabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan beberapa contoh data kacab
        DB::table('kacab')->insert([
            [
                'nama_kacab' => 'Kacab Bandung',
                'no_telpon' => '08123456789',
                'alamat' => 'Jl. Bandung No. 1',
                'id_prov' => 1, // Asumsi provinsi 1 adalah Jawa Barat
                'id_kab' => 1,  // Asumsi kabupaten 1 adalah Bandung
                'id_kec' => 1,  // Asumsi kecamatan 1 adalah Bojongsoang
                'id_kel' => 1,  // Asumsi kelurahan 1 adalah Buah Batu
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kacab' => 'Kacab Surabaya',
                'no_telpon' => '08123456780',
                'alamat' => 'Jl. Surabaya No. 2',
                'id_prov' => 2, // Asumsi provinsi 2 adalah Jawa Timur
                'id_kab' => 2,  // Asumsi kabupaten 2 adalah Surabaya
                'id_kec' => 2,  // Asumsi kecamatan 2 adalah Sukolilo
                'id_kel' => 2,  // Asumsi kelurahan 2 adalah Gebang Putih
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
