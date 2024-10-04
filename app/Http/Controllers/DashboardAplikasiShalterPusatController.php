<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAplikasiShalterPusatController extends Controller
{
    /* Dashboard Aplikasi Shalter */
    // Dashboard Admin Pusat
    public function dashboardShalterPusat() {
        return view('AdminPusat.dashboardAplikasiShalterPusat');
    }

    // Dashboard Admin Shalter
    public function dashboardShalter() {
        return view('AdminShalter.dashboardAplikasiShalter');
    }

    /* Dashboard Admin Cabang */
    public function dashboardCabang() {
        return view('AdminCabang.dashboardAplikasiShalterCabang');
    }
}
