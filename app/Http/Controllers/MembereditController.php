<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member; // Mengimpor model Member
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View; // Menambahkan View import untuk tipe return

class MembereditController extends Controller
{
    public function edit(): View
    {
        $member = Auth::guard('member')->user();
        return view('umum.auth.edit_profile', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        // dd($request);
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'nama_customer' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'password' => 'nullable',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        // Update data
        $member->email = $request->email;
        $member->nama_customer = $request->nama_customer;
        $member->username = $request->username;
        $member->alamat = $request->alamat;
        $member->no_hp = $request->no_hp;

        // Update password jika diisi
        if ($request->filled('password')) {
            $member->password = bcrypt($request->password);
        }

        $member->save();

        // Redirect dengan pesan sukses
        return redirect()->route('member.profile.edit', $member->id)
            ->with('success', 'Data member berhasil diperbarui.');
    }
    private function generateCustomId($prefix, $model)
    {
        $latestId = $model::max('id');
        $number = $latestId ? intval(substr($latestId, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad($number, 7, '0', STR_PAD_LEFT);
    }
}
