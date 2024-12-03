<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\produknostok;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProduknostokController extends Controller
{
    public function ajax()
    {
        $produknostoks = produknostok::all();
        return response()->json($produknostoks);
    }

    public function index(): View
    {
        $produknostoks = produknostok::orderByDesc('created_at')->paginate(10);

        return view('produknostok.index', compact('produknostoks'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        $kategoris = Kategori::all();

        return view('produknostok.create', compact('kategoris'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_produknostok' => 'required',
            'harga' => 'required',
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

        produknostok::create([
            'nama_produknostok' => $request->nama_produknostok,
            'harga' => $request->harga,
            'id_kategori' => $request->id_kategori,
            'foto' => $filename,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route('produknostok.index')->with('success', 'produknostok created successfully.');
    }

    public function edit(produknostok $produknostok): View
    {
        $kategoris = Kategori::all();
        return view('produknostok.edit', compact('produknostok', 'kategoris'));
    }

    public function update(Request $request, produknostok $produknostok)
    {
        $request->validate([
            'nama_produknostok' => 'required',

            'harga' => 'required',
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
        $produknostok->update([
            'nama_produknostok' => $request->nama_produknostok,

            'harga' => $request->harga,
            'id_kategori' => $request->id_kategori,
            'foto' => $filename,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect()->route('produknostok.index')->with('success', 'produknostok update successfully.');
    }

    public function destroy(produknostok $produknostok)
    {
        $produknostok->delete();
        return to_route('produknostok.index');
    }
}
