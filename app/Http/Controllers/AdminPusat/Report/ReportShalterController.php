<?php

namespace App\Http\Controllers\AdminPusat\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shelter;

class ReportShalterController extends Controller
{
    public function shalterAbsenReport() {
        // Mengambil semua data shelter
        $data_shelter = Shelter::all();

        // Memasukkan data shelter ke dalam view
        return view('AdminPusat.Report.ReportShalter.ShalterReportAbsen.shalterreportabsen', compact('data_shelter'));
    }
}
