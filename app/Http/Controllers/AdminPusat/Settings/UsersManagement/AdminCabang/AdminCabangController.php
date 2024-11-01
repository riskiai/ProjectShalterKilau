<?php

namespace App\Http\Controllers\AdminPusat\Settings\UsersManagement\AdminCabang;

use App\Models\User;
use App\Models\Kacab;
use App\Models\AdminCabang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminCabangController extends Controller
{
    public function index(Request $request) {
        $query = AdminCabang::with('kacab', 'user');
    
        // Filter berdasarkan kacab jika dipilih
        if ($request->has('id_kacab') && $request->id_kacab != '') {
            $query->where('id_kacab', $request->id_kacab);
        }
    
        $data_admin_cabang = $query->get();
        $kacab = Kacab::all();
        
        return view('AdminPusat.Settings.UsersManagement.AdminCabang.index', compact('data_admin_cabang', 'kacab'));
    }

    public function create() {
        $kacab = Kacab::all();
        return view('AdminPusat.Settings.UsersManagement.AdminCabang.create', compact('kacab'));
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'id_kacab' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Buat akun user untuk admin cabang
        $user = User::create([
            'username' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'admin_cabang',
            'status' => 'aktif',
        ]);

        // Simpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('AdminCabang/Foto', 'public');
        }

        // Buat data admin cabang
        AdminCabang::create([
            'user_id' => $user->id_users,
            'id_kacab' => $request->id_kacab,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $fotoPath
        ]);

        // Hitung jumlah total halaman dan kembalikan ke halaman terakhir
        $lastPage = ceil(AdminCabang::count() / 10) - 1;

        return redirect()->route('admin_cabang')
                         ->with('success', 'Admin Cabang berhasil ditambahkan')
                         ->with('currentPage', $lastPage);
    }

    public function show($id_admin_cabang) {
        // Mengambil data admin cabang berdasarkan id_admin_cabang
        $admincabang = AdminCabang::with(['user', 'kacab'])->findOrFail($id_admin_cabang);
        
        // Mengembalikan view dengan data yang diambil
        return view('AdminPusat.Settings.UsersManagement.AdminCabang.show', compact('admincabang'));
    }

    public function edit($id_admin_cabang, Request $request) {
        // Temukan admin cabang berdasarkan ID
        $adminshelter = AdminCabang::with(['user', 'kacab'])->findOrFail($id_admin_cabang);
        
        // Ambil data Kacab saja
        $kacab = Kacab::all();
        
        // Current page untuk keperluan navigasi
        $currentPage = $request->query('current_page', 0);
        
        return view('AdminPusat.Settings.UsersManagement.AdminCabang.edit', compact('adminshelter', 'kacab', 'currentPage'));
    }
    
    public function update(Request $request, $id_admin_cabang) {
        $adminshelter = AdminCabang::findOrFail($id_admin_cabang);
    
        // Validasi data
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $adminshelter->user->id_users . ',id_users',
            'password' => 'nullable|min:6',
            'id_kacab' => 'required',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Update data user
        $adminshelter->user->update([
            'email' => $request->email,
            'status' => $request->status,
        ]);
    
        // Jika password diisi, update password
        if (!empty($request->password)) {
            $adminshelter->user->update(['password' => Hash::make($request->password)]);
        }
    
        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('AdminCabang/Foto', 'public');
            $adminshelter->update(['foto' => $fotoPath]);
        }
    
        // Update data admin cabang
        $adminshelter->update([
            'id_kacab' => $request->id_kacab,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
    
        $currentPage = $request->input('current_page', 0);
    
        return redirect()->route('admin_cabang', ['page' => $currentPage])
                         ->with('success', 'Data Admin Cabang berhasil diupdate');
    }
    
    public function destroy(Request $request, $id_admin_cabang) {
        $admincabang = AdminCabang::findOrFail($id_admin_cabang);

        if ($admincabang->foto) {
            Storage::disk('public')->delete($admincabang->foto);
        }

        $admincabang->delete();

        $currentPage = $request->input('current_page', 0);

        return redirect()->route('admin_cabang', ['page' => $currentPage])
                         ->with('success', 'Data Admin Cabang berhasil dihapus')
                         ->with('currentPage', $currentPage);
    }
    
}
