<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }

    public function loginproses(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Proses login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek level user dan arahkan ke dashboard sesuai level
            if (Auth::user()->level === 'admin_pusat') {
                return redirect()->route('dashboardApkShalterPusat')->with('success', 'Login successful');
            } elseif (Auth::user()->level === 'admin_cabang') {
                return redirect()->route('dashboardApkShalterCabang')->with('success', 'Login successful');
            } elseif (Auth::user()->level === 'admin_shelter') {
                return redirect()->route('dashboardApkShalter')->with('success', 'Login successful');
            } else {
                // Jika level tidak dikenali, logout dan kembali ke halaman login
                Auth::logout();
                return redirect('/login')->withErrors(['error' => 'Role not recognized.']);
            }
        }

        // Jika gagal login, tampilkan pesan kesalahan umum
        return back()->withErrors([
            'email' => 'Email dan password yang Anda masukkan salah.',
        ])->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Logout successful');
    }
}
