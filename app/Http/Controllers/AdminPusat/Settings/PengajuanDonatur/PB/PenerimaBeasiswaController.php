<?php

namespace App\Http\Controllers\AdminPusat\Settings\PengajuanDonatur\PB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenerimaBeasiswaController extends Controller
{
    public function pengajuanDonatur(Request $request) {
        // Filter by Kacab, Wilbin, Shelter (dapat disesuaikan)
        // $query = PenerimaBeasiswa::with('kacab', 'wilbin', 'shelter'); // Commented out for now (real model connection)
        
        // If filtering logic is implemented later, below can be uncommented
        // if ($request->has('id_kacab') && $request->id_kacab != '') {
        //     $query->where('id_kacab', $request->id_kacab);
        // }
    
        // if ($request->has('id_wilbin') && $request->id_wilbin != '') {
        //     $query->where('id_wilbin', $request->id_wilbin);
        // }
    
        // if ($request->has('id_shelter') && $request->id_shelter != '') {
        //     $query->where('id_shelter', $request->id_shelter);
        // }

        // Dummy data penerima beasiswa
        $data_penerima_beasiswa = [
            ['id' => 1, 'nama_lengkap' => 'Anisa Sari', 'agama' => 'Islam', 'status_cpb' => 'CPB', 'jk' => 'P', 'anak_ke' => 1, 'hasil_survey' => 'Layak', 'donatur' => 'Belum ada Donatur'],
            ['id' => 2, 'nama_lengkap' => 'Budi Raharjo', 'agama' => 'Islam', 'status_cpb' => 'PB', 'jk' => 'L', 'anak_ke' => 2, 'hasil_survey' => 'Layak', 'donatur' => 'John Doe'],
            ['id' => 3, 'nama_lengkap' => 'Citra Ayu', 'agama' => 'Kristen', 'status_cpb' => 'CPB', 'jk' => 'P', 'anak_ke' => 3, 'hasil_survey' => 'Kurang Layak', 'donatur' => 'Belum ada Donatur'],
            ['id' => 4, 'nama_lengkap' => 'Dewi Larasati', 'agama' => 'Islam', 'status_cpb' => 'PB', 'jk' => 'P', 'anak_ke' => 1, 'hasil_survey' => 'Layak', 'donatur' => 'Belum ada Donatur'],
        ];

        // Mengirim data dummy ke view
        return view('AdminPusat.Settings.PengajuanDonatur.PenerimaBeasiswa.index', compact('data_penerima_beasiswa'));
    }

    public function pengajuanDonaturNpb() {
        // Filter by Kacab, Wilbin, Shelter (dapat disesuaikan)
        // $query = PenerimaBeasiswa::with('kacab', 'wilbin', 'shelter'); // Commented out for now (real model connection)
        
        // If filtering logic is implemented later, below can be uncommented
        // if ($request->has('id_kacab') && $request->id_kacab != '') {
        //     $query->where('id_kacab', $request->id_kacab);
        // }
    
        // if ($request->has('id_wilbin') && $request->id_wilbin != '') {
        //     $query->where('id_wilbin', $request->id_wilbin);
        // }
    
        // if ($request->has('id_shelter') && $request->id_shelter != '') {
        //     $query->where('id_shelter', $request->id_shelter);
        // }

         // Dummy data penerima beasiswa
         $data_penerima_beasiswa_npb = [
            ['id' => 1, 'nama_lengkap' => 'Anisa Sari', 'agama' => 'Islam', 'status_cpb' => 'NPB', 'jk' => 'P', 'anak_ke' => 1, 'hasil_survey' => 'Tidak Layak', 'donatur' => 'Belum ada Donatur'],
            ['id' => 2, 'nama_lengkap' => 'Budi Raharjo', 'agama' => 'Islam', 'status_cpb' => 'NPB', 'jk' => 'L', 'anak_ke' => 2, 'hasil_survey' => 'Tidak Layak', 'donatur' => 'John Doe'],
            ['id' => 3, 'nama_lengkap' => 'Citra Ayu', 'agama' => 'Kristen', 'status_cpb' => 'NPB', 'jk' => 'P', 'anak_ke' => 3, 'hasil_survey' => 'Tidak Layak', 'donatur' => 'Belum ada Donatur'],
            ['id' => 4, 'nama_lengkap' => 'Dewi Larasati', 'agama' => 'Islam', 'status_cpb' => 'NPB', 'jk' => 'P', 'anak_ke' => 1, 'hasil_survey' => 'Tidak Layak', 'donatur' => 'Belum ada Donatur'],
        ];

        // Mengirim data dummy ke view
        return view('AdminPusat.Settings.PengajuanDonatur.NonPenerimaBeasiswa.index', compact('data_penerima_beasiswa_npb'));
    }
}
