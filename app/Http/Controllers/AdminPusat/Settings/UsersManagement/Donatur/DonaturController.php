<?php

namespace App\Http\Controllers\AdminPusat\Settings\UsersManagement\Donatur;

use App\Models\Kacab;
use App\Models\Wilbin;
use App\Models\Shelter;
use App\Models\Donatur;
use App\Models\User;
use App\Models\Bank;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DonaturController extends Controller
{
    public function index(Request $request) {
        $query = Donatur::with('kacab', 'wilbin', 'shelter', 'bank'); // Tambahkan relasi ke bank
        
        if ($request->has('id_kacab') && $request->id_kacab != '') {
            $query->where('id_kacab', $request->id_kacab);
        }
    
        if ($request->has('id_wilbin') && $request->id_wilbin != '') {
            $query->where('id_wilbin', $request->id_wilbin);
        }
    
        if ($request->has('id_shelter') && $request->id_shelter != '') {
            $query->where('id_shelter', $request->id_shelter);
        }
    
        $data_donatur = $query->get();
        $kacab = Kacab::all();
    
        return view('AdminPusat.Settings.UsersManagement.Donatur.index', compact('data_donatur', 'kacab'));
    }
      
    public function create() {
        $kacab = Kacab::all();
        $wilbin = Wilbin::all();
        $banks = Bank::all();  // Ambil data bank dari model Bank
        return view('AdminPusat.Settings.UsersManagement.Donatur.create', compact('kacab', 'wilbin', 'banks'));
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'id_kacab' => 'required',
            'id_wilbin' => 'required',
            'id_shelter' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_bank' => 'required',
            'no_rekening' => 'required',
            'diperuntukan' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Buat akun user untuk donatur
        $user = User::create([
            'username' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hashing password
            'level' => 'donatur',  // Level user diset sebagai 'donatur'
            'status' => 'aktif',  // Status otomatis aktif
        ]);

        // Save the photo if provided
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('UsersManagement/Donatur/', 'public');
        }

        // Buat data donatur
        Donatur::create([
            'id_users' => $user->id,
            'id_kacab' => $request->id_kacab,
            'id_wilbin' => $request->id_wilbin,
            'id_shelter' => $request->id_shelter,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_bank' => $request->id_bank,
            'no_rekening' => $request->no_rekening,
            'diperuntukan' => $request->diperuntukan,
            'foto' => $fotoPath
        ]);

        $lastPage = ceil(Donatur::count() / 10) - 1;

        return redirect()->route('donatur')
                         ->with('success', 'Data Donatur dan Akun Pengguna berhasil ditambahkan')
                         ->with('currentPage', $lastPage);
    }

    public function show($id_donatur) {
        $donatur = Donatur::with(['user', 'kacab', 'wilbin', 'shelter', 'bank'])->findOrFail($id_donatur);
        
        // Cek apakah tab anak asuh dipilih, jika ya, kirimkan data anak asuh
        if (request()->has('tab') && request()->get('tab') == 'anak-asuh') {
            $anak_asuh_count = 3; // Data dummy untuk anak asuh
            $anak_asuh_list = [
                ['nama' => 'Anak Asuh 1', 'umur' => '12 Tahun', 'kelas' => '6 SD'],
                ['nama' => 'Anak Asuh 2', 'umur' => '13 Tahun', 'kelas' => '7 SMP'],
                ['nama' => 'Anak Asuh 3', 'umur' => '11 Tahun', 'kelas' => '5 SD']
            ];
            // Kirim data anak asuh ke view
            return view('AdminPusat.Settings.UsersManagement.Donatur.show', compact('donatur', 'anak_asuh_count', 'anak_asuh_list'));
        }
        
        // Jika tab personal dipilih, kirim hanya data donatur
        return view('AdminPusat.Settings.UsersManagement.Donatur.show', compact('donatur'));
    }    

    public function edit($id_donatur, Request $request) {
        // Temukan donatur berdasarkan ID
        $donatur = Donatur::with(['user', 'kacab', 'wilbin', 'shelter', 'bank'])->findOrFail($id_donatur);
        
        // Ambil semua data relasi yang diperlukan
        $kacab = Kacab::all();
        $wilbin = Wilbin::where('id_kacab', $donatur->id_kacab)->get();
        $shelter = Shelter::where('id_wilbin', $donatur->id_wilbin)->get();
        $banks = Bank::all();
        
        // Pastikan current_page diteruskan ke view dengan aman
        $currentPage = $request->query('current_page', 0); // Mengambil current_page dari query string
        
        // Kirim currentPage ke view bersama dengan data lainnya
        return view('AdminPusat.Settings.UsersManagement.Donatur.edit', compact('donatur', 'kacab', 'wilbin', 'shelter', 'banks', 'currentPage'));
    }
    
    
    public function update(Request $request, $id_donatur) {
        $donatur = Donatur::findOrFail($id_donatur);
    
        // Validasi data
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $donatur->user->id,
            'password' => 'nullable|min:6',
            'id_kacab' => 'required',
            'id_wilbin' => 'required',
            'id_shelter' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_bank' => 'required',
            'no_rekening' => 'required',
            'diperuntukan' => 'required',
            'status' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Update data user
        $donatur->user->update([
            'email' => $request->email,
            'status' => $request->status,
        ]);
    
        // Jika password diisi, update password
        if (!empty($request->password)) {
            $donatur->user->update(['password' => Hash::make($request->password)]);
        }
    
        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('UsersManagement/Donatur/', 'public');
            $donatur->update(['foto' => $fotoPath]);
        }
    
        // Update data donatur
        $donatur->update([
            'id_kacab' => $request->id_kacab,
            'id_wilbin' => $request->id_wilbin,
            'id_shelter' => $request->id_shelter,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_bank' => $request->id_bank,
            'no_rekening' => $request->no_rekening,
            'diperuntukan' => $request->diperuntukan,
        ]);
    
        $currentPage = $request->input('current_page', 0); // Ambil current page dari request

        return redirect()->route('donatur', ['page' => $currentPage]) // Tambahkan parameter page
                         ->with('success', 'Data Donatur berhasil diupdate');
    }
    
    
    public function destroy(Request $request, $id_donatur) {
        $donatur = Donatur::findOrFail($id_donatur);

        if ($donatur->foto) {
            Storage::disk('public')->delete($donatur->foto);
        }

        $donatur->delete();

        $currentPage = $request->input('current_page', 0);

        return redirect()->route('donatur', ['page' => $currentPage])
                         ->with('success', 'Data Donatur berhasil dihapus')
                         ->with('currentPage', $currentPage);
    }

}
