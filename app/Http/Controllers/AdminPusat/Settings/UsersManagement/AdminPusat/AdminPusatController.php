<?php

namespace App\Http\Controllers\AdminPusat\Settings\UsersManagement\AdminPusat;

use App\Models\User;
use App\Models\AdminPusat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminPusatController extends Controller
{
    public function index(Request $request) {
        $data_admin_pusat = AdminPusat::with('user')->get(); // Load relasi user
        return view('AdminPusat.Settings.UsersManagement.AdminPusat.index', compact('data_admin_pusat'));
    }

    public function create() {
        return view('AdminPusat.Settings.UsersManagement.AdminPusat.create');
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Buat akun user untuk admin pusat
        $user = User::create([
            'username' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'admin_pusat',
            'status' => 'aktif',
        ]);

        // Simpan foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('AdminPusat/Foto', 'public');
        }

        // Buat data admin pusat
        AdminPusat::create([
            'id_users' => $user->id_users, // Gunakan 'id_users' dari user yang baru dibuat
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'foto' => $fotoPath
        ]);

        // Hitung jumlah total halaman dan kembalikan ke halaman terakhir
        $lastPage = ceil(AdminPusat::count() / 10) - 1;

        return redirect()->route('admin_pusat')
                         ->with('success', 'Admin Pusat berhasil ditambahkan')
                         ->with('currentPage', $lastPage);
    }

    public function show($id_admin_pusat) {
        // Mengambil data admin pusat berdasarkan id_admin_pusat
        $adminpusat = AdminPusat::with(['user'])->findOrFail($id_admin_pusat);
        
        // Mengembalikan view dengan data yang diambil
        return view('AdminPusat.Settings.UsersManagement.AdminPusat.show', compact('adminpusat'));
    }

    public function edit($id_admin_pusat, Request $request)
    {
        // Temukan admin pusat berdasarkan ID
        $adminshelter = AdminPusat::with(['user'])->findOrFail($id_admin_pusat);
        
        // Current page untuk keperluan navigasi
        $currentPage = $request->query('current_page', 0);
        
        return view('AdminPusat.Settings.UsersManagement.AdminPusat.edit', compact('adminshelter', 'currentPage'));
    }
    
    public function update(Request $request, $id_admin_pusat)
    {
        $adminshelter = AdminPusat::findOrFail($id_admin_pusat);
    
        // Validasi data
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $adminshelter->user->id_users . ',id_users',
            'password' => 'nullable|min:6',
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
            $fotoPath = $request->file('foto')->store('AdminPusat/Foto', 'public');
            $adminshelter->update(['foto' => $fotoPath]);
        }
    
        // Update data admin pusat
        $adminshelter->update([
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);
    
        $currentPage = $request->input('current_page', 0);
    
        return redirect()->route('admin_pusat', ['page' => $currentPage])
                         ->with('success', 'Data Admin Pusat berhasil diupdate');
    }

    public function destroy(Request $request, $id_admin_pusat) {
        $adminpusat = AdminPusat::findOrFail($id_admin_pusat);

        if ($adminpusat->foto) {
            Storage::disk('public')->delete($adminpusat->foto);
        }

        $adminpusat->delete();

        $currentPage = $request->input('current_page', 0);

        return redirect()->route('admin_pusat', ['page' => $currentPage])
                         ->with('success', 'Data Admin Pusat berhasil dihapus')
                         ->with('currentPage', $currentPage);
    }
}
