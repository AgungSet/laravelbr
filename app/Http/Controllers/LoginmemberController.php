<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            return redirect()->intended('/umum/produk'); // Halaman khusus member
        }

        // Kembali ke halaman login jika gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    // Menampilkan form edit profil
    public function editProfile()
    {
        $member = Auth::guard('member')->user();
        return view('umum.auth.edit_profile', compact('member'));
    }

    // Proses update profil
    public function updateProfile(Request $request)
    {
        $member = Auth::guard('member')->user();

        $request->validate([
            'email' => 'required|email|unique:members,email,' . $member->id,
            'nama_customer' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:members,username,' . $member->id,
            'password' => 'nullable|min:8|confirmed',
            'alamat' => 'nullable|string',
            'no_hp' => 'nullable|string|max:15',
        ]);


        // login
        $member = Member::where('username', $request->username)->first();

        if ($member && Hash::check($request->password, $member->password)) {
            // Autentikasi berhasil, login user
            Auth::login($member);

            // Redirect ke dashboard jika login berhasil
            return redirect()->route('dashboardumum');
        } else {
            // Login gagal, kembali ke halaman login dengan pesan error
            return redirect()->back()->withErrors(['login_error' => 'Username atau Password salah.']);
        }
        // Update data member
        $member->email = $request->email;
        $member->nama_customer = $request->nama_customer;
        $member->username = $request->username;

        if ($request->filled('password')) {
            $member->password = Hash::make($request->password);
        }

        $member->alamat = $request->alamat;
        $member->no_hp = $request->no_hp;
        $member->save();

        return redirect()->route('member.profile.edit')->with('success', 'Profil berhasil diperbarui.');
    }

    // Proses logout
    public function logout()
    {
        Auth::guard('member')->logout();
        return redirect()->route('umum.produk');
    }
    private function generateCustomId($prefix, $model)
    {
        $latestId = $model::max('id');
        $number = $latestId ? intval(substr($latestId, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad($number, 7, '0', STR_PAD_LEFT);
    }
}
