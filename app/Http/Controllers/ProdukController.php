<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function ajax()
    {
        $produks = produk::all();
        return response()->json($produks);
    }

    public function index(): View
    {
        $produks = produk::orderByDesc('created_at')->paginate(10);

        return view('produk.index', compact('produks'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required'
        ]);
        produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('produk.index')->with('success', 'produk created successfully.');
    }

    public function edit(produk $produk): View
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required'
        ]);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('produk.index')->with('success', 'produk update successfully.');
    }

    public function destroy(produk $produk)
    {
        $produk->delete();
        return to_route('produk.index');
    }
}
