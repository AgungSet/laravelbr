<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function ajax()
    {
        $kategoris = Kategori::all();
        return response()->json($kategoris);
    }

    public function index(): View
    {
        $kategoris = Kategori::orderByDesc('created_at')->paginate(10);

        return view('kategori.index', compact('kategoris'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ]);
        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('kategori.index')->with('success', 'kategori created successfully.');
    }

    public function edit(Kategori $kategori): View
    {
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required'
        ]);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('kategori.index')->with('success', 'kategori update successfully.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return to_route('kategori.index');
    }
}
