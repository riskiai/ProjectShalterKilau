<?php

namespace App\Http\Controllers\AdminPusat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminPusatController extends Controller
{
     /* Dashboard Admin Pusat */
     public function dashboardPemberdayaanPusat() {
        return view('AdminPusat.Pemberdayaan.dashboardAdminPusatPemberdayaan');
    }

    public function dashboardReportPusat() {
        return view('AdminPusat.Report.dashboardAdminPusatReport');
    }

    public function dashboardSettingsPusat() {
        return view('AdminPusat.Settings.dashboardAdminPusatSettings');
    }

    public function dashboardKeuanganPusat() {
        return view('AdminPusat.Keuangan.dashboardAdminPusatKeuangan');
    }

    public function dashboardBeritaPusat() {
        return view('AdminPusat.Berita.dashboardAdminPusatBerita');
    }
}
