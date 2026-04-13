<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilan Login
    public function showLogin() {
        return view('auth.login');
    }

    // Tampilan Register
    public function showRegister() {
        return view('auth.register');
    }

    // Proses Register
    public function register(Request $request) {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Buat User baru dengan password yang di-Hash (diacak)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // WAJIB agar bisa login
        ]);

        // Alur: Setelah daftar, diarahkan ke Login (bukan langsung dashboard)
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silakan login, Beh.');
    }

    // Proses Login
    public function login(Request $request) {
        // Ambil data email dan password dari form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek kecocokan data dengan database
        if (Auth::attempt($credentials)) {
            // Jika cocok, buatkan sesi baru
            $request->session()->regenerate();
            
            // Lempar ke dashboard
            return redirect()->intended('dashboard');
        }

        // Jika gagal, balik ke login dengan pesan error
        return back()->withErrors([
            'email' => 'Waduh, Email atau Password salah nih, Beh!',
        ])->onlyInput('email');
    }

    // Proses Logout
    public function logout(Request $request) {
        Auth::logout();

        // Hancurkan sesi agar aman
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Balik ke halaman login awal
        return redirect()->route('login');
    }
}