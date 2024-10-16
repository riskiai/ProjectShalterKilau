<?php

namespace App\Http\Controllers\AdminPusat\Settings\AnakTutor\Absen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbsenUserController extends Controller
{
    public function absenAnak() {
        // Data dummy anak binaan
        $data_absensi = [
            ['id' => 1, 'nama_anak_binaan' => 'Budi'],
            ['id' => 2, 'nama_anak_binaan' => 'Siti'],
            ['id' => 3, 'nama_anak_binaan' => 'Andi'],
            ['id' => 4, 'nama_anak_binaan' => 'Rina']
        ];

        // Mengirim data dummy ke view
        return view('AdminPusat.Settings.AnakTutor.AbsensiAnak.index', compact('data_absensi'));
    }

    public function absenTutor() {
        // Data dummy tutor
        $data_absensi_tutor = [
            ['id' => 1, 'nama_tutor' => 'Pak Joko'],
            ['id' => 2, 'nama_tutor' => 'Bu Sari'],
            ['id' => 3, 'nama_tutor' => 'Pak Budi'],
            ['id' => 4, 'nama_tutor' => 'Bu Rina']
        ];

        // Mengirim data dummy ke view
        return view('AdminPusat.Settings.AnakTutor.AbsensiTutor.index', compact('data_absensi_tutor'));
    }
}
