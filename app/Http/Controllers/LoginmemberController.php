<?php

namespace App\Http\Controllers;

use App\Models\member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginmemberController extends Controller
{
    public function showRegisterForm()
    {
        return view('umum.auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required',
            'nama_customer' => 'required',
            'username' => 'required',
            'password' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        // Membuat user baru dengan memasukkan data yang telah divalidasi
        Member::create([
            'email' => $request->email,
            'nama_customer' => $request->nama_customer,
            'username' => $request->username,
            'password' => bcrypt($request->password), // Mengenkripsi password
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('umum.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('umum.auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Autentikasi menggunakan guard 'member' dan model Member
        if (Auth::guard('member')->attempt($credentials)) {
            return redirect()->intended('/'); // Halaman khusus member
        }

        // Kembali ke halaman login jika gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }
    // Proses logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('umum.login');
    }
}
