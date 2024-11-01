<?php

namespace App\Http\Controllers\AdminPusat\Pemberdayaan\DataBinaan\DataAnakBinaan;

use App\Models\Anak;
use App\Models\Kacab;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use App\Models\AnakPendidikan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DataAnakBinaanController extends Controller
{
    public function index(Request $request) {
         // Query dasar untuk anak yang sudah diaktivasi
         $query = Anak::where('status_validasi', Anak::STATUS_AKTIF)->with('keluarga');

        // Filter berdasarkan Kacab, Wilayah Binaan, dan Shelter
        if ($request->has('id_kacab') && $request->id_kacab != '') {
            $query->whereHas('keluarga', function ($q) use ($request) {
                $q->where('id_kacab', $request->id_kacab);
            });
        }

        if ($request->has('id_wilbin') && $request->id_wilbin != '') {
            $query->whereHas('keluarga', function ($q) use ($request) {
                $q->where('id_wilbin', $request->id_wilbin);
            });
        }

        if ($request->has('id_shelter') && $request->id_shelter != '') {
            $query->whereHas('keluarga', function ($q) use ($request) {
                $q->where('id_shelter', $request->id_shelter);
            });
        }

        // Paginasi hasil query
        $data_anak = $query->get();

        // Ambil semua data kacab untuk dropdown filter
        $kacab = Kacab::all();

        return view('AdminPusat.Pemberdayaan.DataBinaan.DataAnakBinaan.index', compact('data_anak', 'kacab'));
    }

    public function nonactivasi($id)
    {
        $anak = Anak::findOrFail($id);
    
        // Update status validasi menjadi "Tidak Aktif" menggunakan konstanta
        $anak->status_validasi = Anak::STATUS_NON_AKTIF;
        $anak->save();
    
        // Redirect ke halaman "Data Anak Non Binaan" setelah non-aktivasi
        return redirect()->route('NonAnakBinaan')->with('success', 'Status validasi anak berhasil dinonaktifkan.');
    }

    public function show($id_anak)
    {
        // Ambil data anak beserta relasi keluarga, pendidikan, dan shelter
        $anak = Anak::with(['keluarga', 'anakPendidikan', 'shelter'])
                    ->findOrFail($id_anak);

        // Tentukan tab yang akan di-load
        $tab = request()->get('tab', 'data-anak');

        // Tampilkan halaman show dengan tab yang sesuai
        return view('AdminPusat.Pemberdayaan.DataBinaan.DataAnakBinaan.show', compact('anak', 'tab'));
    }

    /* Data Edit Di Calon Anak Binaan */
    // Menampilkan form edit data anak
    public function editanakbinaan($id)
    {
        $anak = Anak::with('keluarga')->findOrFail($id); // Mengambil data anak beserta keluarga
        $daftarKeluarga = Keluarga::all(); // Mengambil seluruh data keluarga untuk dropdown ganti keluarga

        return view('AdminPusat.Pemberdayaan.DataBinaan.DataAnakBinaan.DataAnakEditBinaan.AnakBinaanEdit', compact('anak', 'daftarKeluarga'));
    }

    // Menyimpan proses update data anak
    public function editprosessanakbinaan(Request $request, $id)
    {
        $request->validate([
            'nik_anak' => 'required|string|max:16',
            'anak_ke' => 'required|integer',
            'dari_bersaudara' => 'required|integer',
            'nick_name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'agama' => 'required|string|in:Islam,Kristen,Budha,Hindu,Konghucu',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
            'tinggal_bersama' => 'required|string|in:Ayah,Wali',
            'jenis_anak_binaan' => 'required|string|in:BPCB,NPB',
            'pelajaran_favorit' => 'nullable|string|max:255',
            'prestasi' => 'nullable|string|max:255',
            'jarak_rumah' => 'nullable|integer',
            'transportasi' => 'required|string|in:jalan_kaki,sepeda,sepeda_motor,angkutan_umum,diantar_orang_tua_wali,lainnya',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'id_keluarga' => 'required|exists:keluarga,id_keluarga', // Validasi No Keluarga
        ]);

        // Temukan data anak
        $anak = Anak::findOrFail($id);

        // Update data anak
        $anak->update([
            'nik_anak' => $request->nik_anak,
            'anak_ke' => $request->anak_ke,
            'dari_bersaudara' => $request->dari_bersaudara,
            'nick_name' => $request->nick_name,
            'full_name' => $request->full_name,
            'agama' => $request->agama,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tinggal_bersama' => $request->tinggal_bersama,
            'jenis_anak_binaan' => $request->jenis_anak_binaan,
            'pelajaran_favorit' => $request->pelajaran_favorit,
            'prestasi' => $request->prestasi,
            'jarak_rumah' => $request->jarak_rumah,
            'transportasi' => $request->transportasi,
            'id_keluarga' => $request->id_keluarga, // Update No Keluarga
        ]);

        // Cek jika ada foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($anak->foto) {
                Storage::disk('public')->delete($anak->foto);
            }
            // Upload foto baru
            $fotoPath = $request->file('foto')->store('Anak/DataFoto', 'public');
            $anak->update(['foto' => $fotoPath]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->route('AnakBinaan.show', $anak->id_anak)
                         ->with('success', 'Data anak berhasil diperbarui.');
    }
    

    // Data Pendidikan Anak
    public function editPendidikanAnak($id) {
        $anak = Anak::with('anakPendidikan')->findOrFail($id); // Mengambil data anak beserta pendidikan
        return view('AdminPusat.Pemberdayaan.DataBinaan.DataAnakBinaan.DataPendidikanAnakEdit.DataPendidikanBinaanEdit', compact('anak'));
    }

    public function editprosesspendidikananak(Request $request, $id)
    {
        $request->validate([
            'jenjang' => 'required|string|in:belum_sd,sd,smp,sma,perguruan_tinggi',
            'kelas' => 'nullable|string|max:255',
            'nama_sekolah' => 'nullable|string|max:255',
            'alamat_sekolah' => 'nullable|string|max:255',
            'jurusan' => 'nullable|string|max:255',
            'semester' => 'nullable|integer',
            'nama_pt' => 'nullable|string|max:255',
            'alamat_pt' => 'nullable|string|max:255',
        ]);
        
        // Temukan data pendidikan anak berdasarkan id_anak_pend
        $pendidikan = AnakPendidikan::where('id_anak_pend', $id)->firstOrFail();

        // Temukan data anak untuk mendapatkan id_anak
        $anak = Anak::where('id_anak_pend', $pendidikan->id_anak_pend)->firstOrFail();

        // Update data pendidikan anak, dan kosongkan field jika jenjang tertentu dipilih
        if ($request->jenjang == 'belum_sd') {
            $pendidikan->update([
                'jenjang' => $request->jenjang,
                'kelas' => null,
                'nama_sekolah' => null,
                'alamat_sekolah' => null,
                'jurusan' => null,
                'semester' => null,
                'nama_pt' => null,
                'alamat_pt' => null,
            ]);
        } elseif ($request->jenjang == 'sd' || $request->jenjang == 'smp' || $request->jenjang == 'sma') {
            $pendidikan->update([
                'jenjang' => $request->jenjang,
                'kelas' => $request->kelas,
                'nama_sekolah' => $request->nama_sekolah,
                'alamat_sekolah' => $request->alamat_sekolah,
                'jurusan' => null,
                'semester' => null,
                'nama_pt' => null,
                'alamat_pt' => null,
            ]);
        } elseif ($request->jenjang == 'perguruan_tinggi') {
            $pendidikan->update([
                'jenjang' => $request->jenjang,
                'kelas' => null,
                'nama_sekolah' => null,
                'alamat_sekolah' => null,
                'jurusan' => $request->jurusan,
                'semester' => $request->semester,
                'nama_pt' => $request->nama_pt,
                'alamat_pt' => $request->alamat_pt,
            ]);
        }

        // Redirect kembali dengan pesan sukses ke tab 'anak-pendidikan'
        return redirect()->route('AnakBinaan.show', ['id' => $anak->id_anak, 'tab' => 'anak-pendidikan'])
                        ->with('success', 'Data pendidikan anak berhasil diperbarui.');
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
        $currentPage = $request->input('current_page', 1);  // Default ke halaman 1 jika tidak ada
        
        // Redirect ke halaman Anak Binaan dengan pesan sukses
        return redirect()->route('AnakBinaan', ['page' => $currentPage])
                         ->with('success', 'Data Anak Binaan berhasil dihapus.')
                         ->with('currentPage', $currentPage);
    }
    
    
}
