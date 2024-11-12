<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pesanan;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function ajax()
    {
        $pesanans = pesanan::all();
        return response()->json($pesanans);
    }

    public function index(): View
    {
        $pesanans = pesanan::orderByDesc('created_at')->paginate(10);

        return view('pesanan.index', compact('pesanans'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        $kategoris = Kategori::all();

        return view('pesanan.create', compact('kategoris'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_pesanan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'deskripsi' => 'deskripsi',
            'id_kategori' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
        ]);
        // Menghandle upload file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename); // Menyimpan file ke folder 'uploads'
        }

        pesanan::create([
            'nama_pesanan' => $request->nama_pesanan,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'deskripsi' => $request->deskripsi,
            'id_kategori' => $request->id_kategori,
            'foto' => $filename,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route('pesanan.index')->with('success', 'pesanan created successfully.');
    }

    public function edit(pesanan $pesanan): View
    {
        $kategoris = Kategori::all();
        return view('pesanan.edit', compact('pesanan', 'kategoris'));
    }

    public function update(Request $request, pesanan $pesanan)
    {
        $request->validate([
            'nama_pesanan' => 'required',
            'harga' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'deskripsi' => 'deskripsi',
            'id_kategori' => 'required',
            'foto' => 'required',
            'deskripsi' => 'required',
        ]);

        // Menghandle upload file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename); // Menyimpan file ke folder 'uploads'
        }
        $pesanan->update([
            'nama_pesanan' => $request->nama_pesanan,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'deskripsi' => $request->deskripsi,
            'id_kategori' => $request->id_kategori,
            'foto' => $filename,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('pesanan.index')->with('success', 'pesanan update successfully.');
    }

    public function destroy(pesanan $pesanan)
    {
        $pesanan->delete();
        return to_route('pesanan.index');
    }
}
