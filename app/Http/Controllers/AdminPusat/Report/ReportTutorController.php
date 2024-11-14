<?php

namespace App\Http\Controllers\AdminPusat\Report;

use App\Http\Controllers\Controller;
use App\Models\Tutor;
use Illuminate\Http\Request;

class ReportTutorController extends Controller
{
    // Report Tutor Pekanan
    public function reportTutorPekanan() {
        $data_tutor = Tutor::all();

        return view('AdminPusat.Report.ReportTutor.TutorReportPekanan.tutorrportpekanan', compact('data_tutor'));
    }

    public function reportTutorPendidikan() {
        $data_tutor = Tutor::all();

        return view('AdminPusat.Report.ReportTutor.TutorReportPendidikan.tutorreportpendidikan', compact('data_tutor'));
    }
}
