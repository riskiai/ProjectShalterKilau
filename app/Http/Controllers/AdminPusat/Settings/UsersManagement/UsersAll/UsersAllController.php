<?php

namespace App\Http\Controllers\AdminPusat\Settings\UsersManagement\UsersAll;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersAllController extends Controller
{
    public function index() {
        // Mengambil semua data struktur
        $data_users = User::get(); // Menampilkan 10 data per halaman
        return view('AdminPusat.Settings.UsersManagement.Usersall.index', compact('data_users'));
    }

    public function create() {
        return view('AdminPusat.Settings.UsersManagement.Usersall.create');
    }

    public function store(Request $request) {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'level' => 'required|string',
            'status' => 'required|string',
        ]);
    
        // Buat user baru
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'status' => $request->status,
        ]);
    
        // Cek level pengguna dan simpan ke tabel terkait
        switch ($user->level) {
            case 'admin_pusat':
                // Simpan ke tabel admin_pusat
                \App\Models\AdminPusat::create([
                    'id_users' => $user->id_users,
                    'nama_lengkap' => $user->username,
                    'alamat' => 'Alamat default', // Ganti dengan alamat yang benar jika diperlukan
                    'no_hp' => '0000000000', // Ganti dengan nomor hp yang benar jika diperlukan
                    'foto' => null, // Foto default
                ]);
                break;
            case 'admin_cabang':
                // Simpan ke tabel admin_cabang
                \App\Models\AdminCabang::create([
                    'user_id' => $user->id_users,
                    'id_kacab' => 1, // Ganti dengan ID kantor cabang yang sesuai
                    'nama_lengkap' => $user->username,
                    'alamat' => 'Alamat default', // Ganti dengan alamat yang benar jika diperlukan
                    'no_hp' => '0000000000', // Ganti dengan nomor hp yang benar jika diperlukan
                    'foto' => null, // Foto default
                ]);
                break;
            case 'admin_shelter':
                // Simpan ke tabel admin_shelter
                \App\Models\AdminShelter::create([
                    'user_id' => $user->id_users,
                    'id_kacab' => 1, // Ganti dengan ID kantor cabang yang sesuai
                    'id_wilbin' => 1, // Ganti dengan ID wilayah binaan yang sesuai
                    'id_shelter' => 1, // Ganti dengan ID shelter yang sesuai
                    'nama_lengkap' => $user->username,
                    'alamat_adm' => 'Alamat default', // Ganti dengan alamat yang benar jika diperlukan
                    'no_hp' => '0000000000', // Ganti dengan nomor hp yang benar jika diperlukan
                    'foto' => null, // Foto default
                ]);
                break;
            case 'donatur':
                // Simpan ke tabel donatur
                \App\Models\Donatur::create([
                    'id_users' => $user->id_users,
                    'id_kacab' => 1, // Ganti dengan ID kantor cabang yang sesuai
                    'id_wilbin' => 1, // Ganti dengan ID wilayah binaan yang sesuai
                    'id_shelter' => 1, // Ganti dengan ID shelter yang sesuai
                    'nama_lengkap' => $user->username,
                    'alamat' => 'Alamat default', // Ganti dengan alamat yang benar jika diperlukan
                    'no_hp' => '0000000000', // Ganti dengan nomor hp yang benar jika diperlukan
                    'id_bank' => 1, // Ganti dengan ID bank yang sesuai
                    'no_rekening' => '0000000000', // Ganti dengan nomor rekening yang benar jika diperlukan
                    'foto' => null, // Foto default
                    'diperuntukan' => 'Pengajuan Donatur (Calon Anak Non Beasiswa)', // Ganti dengan peruntukan yang sesuai
                ]);
                break;
        }
    
        // Menghitung halaman terakhir jika data bertambah
        $totalData = User::count();
        $perPage = 10;
        $lastPage = ceil($totalData / $perPage) - 1;
    
        return redirect()->route('usersall')
                         ->with('success', 'User berhasil ditambahkan')
                         ->with('currentPage', $lastPage);
    }

    public function edit($id_users, Request $request) {
        // Ambil data user berdasarkan ID
        $user = User::findOrFail($id_users);
    
        // Mengembalikan view dengan data user dan halaman saat ini
        return view('AdminPusat.Settings.UsersManagement.Usersall.edit', compact('user'))
            ->with('currentPage', $request->query('current_page', 0));
    }    
    

    public function update(Request $request, $id_users) {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id_users . ',id_users', // Gunakan id_users, bukan id
            'level' => 'required|string',
            'status' => 'required|string',
        ]);
    
        // Update data user
        $user = User::findOrFail($id_users);
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'level' => $request->level,
            'status' => $request->status,
        ]);
    
        // Update password jika diisi
        if ($request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
        }
    
        // Cek level pengguna dan perbarui data di tabel terkait
        switch ($user->level) {
            case 'admin_pusat':
                $adminPusat = \App\Models\AdminPusat::where('id_users', $user->id_users)->first();
                if ($adminPusat) {
                    // Hanya update `username` tanpa mengganti data lain jika data sudah ada
                    $adminPusat->update([
                        'nama_lengkap' => $user->username,
                    ]);
                }
                break;
    
            case 'admin_cabang':
                $adminCabang = \App\Models\AdminCabang::where('user_id', $user->id_users)->first();
                if ($adminCabang) {
                    // Hanya update `username` tanpa mengganti data lain jika data sudah ada
                    $adminCabang->update([
                        'nama_lengkap' => $user->username,
                    ]);
                }
                break;
    
            case 'admin_shelter':
                $adminShelter = \App\Models\AdminShelter::where('user_id', $user->id_users)->first();
                if ($adminShelter) {
                    // Hanya update `username` tanpa mengganti data lain jika data sudah ada
                    $adminShelter->update([
                        'nama_lengkap' => $user->username,
                    ]);
                }
                break;
    
            case 'donatur':
                $donatur = \App\Models\Donatur::where('id_users', $user->id_users)->first();
                if ($donatur) {
                    // Hanya update `username` tanpa mengganti data lain jika data sudah ada
                    $donatur->update([
                        'nama_lengkap' => $user->username,
                    ]);
                }
                break;
        }
    
        return redirect()->route('usersall')
                         ->with('success', 'Data user berhasil diperbarui')
                         ->with('currentPage', $request->input('current_page', 0));
    }
    
    

    public function destroy(Request $request, $id_users) {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id_users);
        // Hapus user
        $user->delete();
    
        // Redirect ke halaman pagination yang sama setelah penghapusan
        return redirect()->route('usersall')
                         ->with('success', 'User berhasil dihapus')
                         ->with('currentPage', $request->input('current_page', 0));  // Biarkan seperti ini
    }
    
    
}
