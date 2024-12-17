<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
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
        $kategoris = Kategori::all();

        return view('produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_kategori' => 'required',
            'foto' => 'nullable|file', // Foto tidak lagi required, boleh kosong
            'deskripsi' => 'required',
        ]);

        // Menghandle upload file
        $filename = 'sample.jpg'; // Default jika tidak ada file diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename); // Menyimpan file ke folder 'uploads'
        }

        // Menyimpan data ke database
        produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'foto' => $filename, // Tetap null jika tidak ada file diunggah
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk created successfully.');
    }

    public function edit(produk $produk): View
    {
        $kategoris = Kategori::all();
        return view('produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'id_kategori' => 'required',
            'foto' => 'nullable|file',
            'deskripsi' => 'required',
        ]);

        // Menghandle upload file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename); // Menyimpan file baru ke folder 'uploads'
        } else {
            $existingData = produk::find($produk->id);
            $filename = $existingData->foto; // Tetap gunakan file lama
        }
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'foto' => $filename,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route('produk.index')->with('success', 'produk update successfully.');
    }

    public function destroy(produk $produk)
    {
        $produk->delete();
        return to_route('produk.index');
    }
}
