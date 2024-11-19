<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Member;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function ajax()
    {
        $members = member::all();
        return response()->json($members);
    }

    public function index(): View
    {
        $members = member::orderByDesc('created_at')->paginate(10);

        return view('member.index', compact('members'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        $produks = Produk::all();
        return view('member.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_member' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'instagram' => 'required',


        ]);
        member::create([
            'nama_member' => $request->nama_member,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'instagram' => $request->instagram,



        ]);
        return redirect()->route('member.index')->with('success', 'member created successfully.');
    }

    public function edit(member $member): View
    {
        $produks = Produk::all();
        return view('member.edit', compact('member', 'produks'));
    }

    public function update(Request $request, member $member)
    {
        // dd($request);
        $request->validate([
            'nama_member' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'instagram' => 'required',
        ]);
        $member->update([
            'nama_member' => $request->nama_member,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'instagram' => $request->instagram,
        ]);
        return redirect()->route('member.index')->with('success', 'transakai update successfully.');
    }

    public function destroy(member $member)
    {
        $member->delete();
        return to_route('member.index');
    }
}
