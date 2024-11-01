<?php

namespace App\Http\Controllers\AdminPusat;

use App\Models\User;
use App\Models\Donatur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminCabang;
use App\Models\AdminPusat;
use App\Models\AdminShelter;
use App\Models\AlQuran;
use App\Models\Bank;
use App\Models\Kacab;
use App\Models\Materi;
use App\Models\Tutor;
use App\Models\Wilbin;

class DashboardAdminPusatController extends Controller
{
     /* Dashboard Admin Pusat */

    public function dashboardSettingsPusat() {
        $totalUsers = User::count();
        $totalDonatur = Donatur::count();
        $totalAdminShelter = AdminShelter::count();
        $totalAdminCabang = AdminCabang::count();
        $totalAdminPusat = AdminPusat::count();
        $totalTutor = Tutor::count();
        $totalCabang = Kacab::count();
        $totalWilbin = Wilbin::count();
        $totalShelter = Wilbin::count();
        $totalQuran = AlQuran::count();
        $totalbank = Bank::count();
        $totalMateri = Materi::count();
        
        return view('AdminPusat.Settings.dashboardAdminPusatSettings', compact('totalUsers', 'totalDonatur', 'totalAdminShelter', 'totalAdminCabang', 'totalAdminPusat', 'totalTutor', 'totalCabang', 'totalWilbin', 'totalShelter', 'totalQuran', 'totalbank', 'totalMateri'));
    }


     public function dashboardPemberdayaanPusat() {
        return view('AdminPusat.Pemberdayaan.dashboardAdminPusatPemberdayaan');
    }

    public function dashboardReportPusat() {
        return view('AdminPusat.Report.dashboardAdminPusatReport');
    }

    public function dashboardKeuanganPusat() {
        return view('AdminPusat.Keuangan.dashboardAdminPusatKeuangan');
    }

    public function dashboardBeritaPusat() {
        return view('AdminPusat.Berita.dashboardAdminPusatBerita');
    }
}
