<?php

namespace App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\DataAnakNonBinaan;

use App\Models\Anak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DataAnakNonBinaanController extends Controller
{
    public function index() {
        // Ambil data anak yang sudah diaktifkan tetapi statusnya sekarang tidak aktif
        $data_anak = Anak::with('keluarga', 'shelter')
                         ->where('status_validasi', Anak::STATUS_NON_AKTIF)
                         ->get();

        return view('AdminPusat.Pemberdayaan.DataBinaan.DataNonBinaan.index', compact('data_anak'));
    }

    public function nonbinaanactivactivasi($id)
    {
        $anak = Anak::findOrFail($id);

        // Update status validasi menjadi 'Aktif' dan perbarui status CPB berdasarkan jenis anak binaan
        if ($anak->jenis_anak_binaan == 'BPCB') {
            $anak->status_cpb = Anak::STATUS_CPB_BCPB;
        } elseif ($anak->jenis_anak_binaan == 'NPB') {
            $anak->status_cpb = Anak::STATUS_CPB_NPB;
        }

        // Set status validasi ke "Aktif" menggunakan konstanta
        $anak->status_validasi = Anak::STATUS_AKTIF;
        $anak->save();

        // Redirect ke halaman Anak Binaan setelah aktivasi
        return redirect()->route('AnakBinaan')->with('success', 'Status validasi anak berhasil diaktifkan.');
    }

    public function show($id_anak)
    {
        // Ambil data anak beserta relasi keluarga, pendidikan, dan shelter
        $anak = Anak::with(['keluarga', 'anakPendidikan', 'shelter'])
                    ->findOrFail($id_anak);

        // Tentukan tab yang akan di-load
        $tab = request()->get('tab', 'data-anak');

        // Tampilkan halaman show dengan tab yang sesuai
        return view('AdminPusat.Pemberdayaan.DataBinaan.DataNonBinaan.show', compact('anak', 'tab'));
    }

    public function destroy(Request $request, $id_anak)
    {
        // Temukan data Anak berdasarkan id
        $anak = Anak::findOrFail($id_anak);

        // Jika anak memiliki foto, hapus foto dari storage
        if ($anak->foto) {
            Storage::disk('public')->delete($anak->foto);
        }

        // Hapus data anak
        $anak->delete();

        // Ambil halaman saat ini dari request
        $currentPage = $request->input('current_page', 0);

        // Redirect ke halaman Non Anak Binaan dengan pesan sukses
        return redirect()->route('NonAnakBinaan', ['page' => $currentPage])
                        ->with('success', 'Data Non Anak Binaan berhasil dihapus')
                        ->with('currentPage', $currentPage);
    }

}
