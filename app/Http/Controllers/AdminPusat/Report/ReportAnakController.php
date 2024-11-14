<?php

namespace App\Http\Controllers\AdminPusat\Report;

use App\Models\Anak;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportAnakController extends Controller
{
    public function reportAnak()
    {
        // Mengambil data anak dari database
        $data_anak = Anak::all(); // Atau bisa disesuaikan dengan filter tertentu jika diperlukan

        // Meneruskan data ke tampilan
        return view('AdminPusat.Report.ReportAnak.reportanak', compact('data_anak'));
    }

    public function exportPdf()
    {
        $data_anak = Anak::all();
        
        // Load view reportanak_pdf.blade.php dan kirim data
        $pdf = PDF::loadView('AdminPusat.Report.ReportAnak.reportanak_pdf', compact('data_anak'));
        
        // Download PDF
        return $pdf->download('Laporan_Kehadiran_Anak.pdf');
    }
}
