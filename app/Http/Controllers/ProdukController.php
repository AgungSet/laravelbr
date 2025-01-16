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
        $produks = Produk::all();
        return response()->json($produks);
    }

    public function index(): View
    {
        $produks = Produk::orderByDesc('created_at')->paginate(10);

        return view('produk.index', compact('produks'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
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
            'foto' => 'nullable|file',
            'deskripsi' => 'required',
        ]);

        // Menghandle upload file
        $filename = 'sample.jpg'; // Default jika tidak ada file diunggah
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
        }

        // Menyimpan data ke database dengan ID unik
        Produk::create([
            'id' => $this->generateCustomId('PRD', Produk::class), //custom id
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'foto' => $filename,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk created successfully.');
    }

    public function edit(Produk $produk): View
    {
        $kategoris = Kategori::all();
        return view('produk.edit', compact('produk', 'kategoris'));
    }

    public function update(Request $request, Produk $produk)
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
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk updated successfully.');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return to_route('produk.index');
    }

    private function generateCustomId($prefix, $model)
    {
        $latestId = $model::max('id');
        $number = $latestId ? intval(substr($latestId, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad($number, 7, '0', STR_PAD_LEFT);
    }
}
