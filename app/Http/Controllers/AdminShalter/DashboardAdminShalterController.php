<?php

namespace App\Http\Controllers\AdminShalter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardAdminShalterController extends Controller
{
    /* Dashboard Admin Shalter */
    public function dashboardPemberdayaanShalter() {
        return view('AdminShalter.Pemberdayaan.dashboardAdminShalterPemberdayaan');
    }

    public function dashboardReportShalter() {
        return view('AdminShalter.Report.dashboardAdminShalterReport');
    }

    public function dashboardKeuanganShalter() {
        return view('AdminShalter.Keuangan.dashboardAdminShalterKeuangan');
    }
}
