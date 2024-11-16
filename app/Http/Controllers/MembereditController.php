<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MembereditController extends Controller
{
    public function edit($id_member)
    {
        // Cari member berdasarkan id_member
        $member = Member::findOrFail($id_member);

        // Return view edit dengan data member
        return view('member.edit', compact('member'));
    }

    public function logout(Request $request)
    {
        Memberedit::logout();

        // Redirect ke halaman login
        return redirect()->route('login')->with('status', 'Anda telah logout.');
    }
    public function update(Request $request, $id_member)
    {
        $member = Member::findOrFail($id_member);

        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $member->email = $request->input('email');
        $member->name = $request->input('name');
        $member->username = $request->input('username');
        $member->phone = $request->input('phone');
        $member->address = $request->input('address');

        if ($request->filled('password')) {
            $member->password = bcrypt($request->input('password'));
        }

        $member->save();

        return redirect()->route('member.edit', $id_member)->with('status', 'Data member berhasil diperbarui.');
    }
}
