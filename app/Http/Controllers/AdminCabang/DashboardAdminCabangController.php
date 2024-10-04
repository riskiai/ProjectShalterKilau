<?php

namespace App\Http\Controllers\AdminCabang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminCabangController extends Controller
{
    /* Dashboard Admin Cabang */
    public function dashboardPemberdayaanCabang() {
        return view('AdminCabang.Pemberdayaan.dashboardAdminCabangPemberdayaan');
    }

    public function dashboardReportCabang() {
        return view('AdminCabang.Report.dashboardAdminCabangReport');
    }

    public function dashboardKeuanganCabang() {
        return view('AdminCabang.Keuangan.dashboardAdminCabangKeuangan');
    }

    public function dashboardSettingsCabang() {
        return view('AdminCabang.Settings.dashboardAdminCabangSettings');
    }
}
