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
            'foto' => 'nullable|file',
            'deskripsi' => 'required',
        ]);

        // Menghandle upload file
        $filename = 'sample.jpg'; // Default value
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

        return redirect()->route('produknostok.index')->with('success', 'Produknostok created successfully.');
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
            'foto' => 'nullable|image',
            'deskripsi' => 'required',
        ]);

        // Menghandle upload file
        $filename = $produknostok->foto; // Default to the existing photo
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

        return redirect()->route('produknostok.index')->with('success', 'Produknostok updated successfully.');
    }

    public function destroy(produknostok $produknostok)
    {
        $produknostok->delete();
        return to_route('produknostok.index')->with('success', 'Produknostok deleted successfully.');
    }
    private function generateCustomId($prefix, $model)
    {
        $latestId = $model::max('id');
        $number = $latestId ? intval(substr($latestId, strlen($prefix))) + 1 : 1;
        return $prefix . str_pad($number, 7, '0', STR_PAD_LEFT);
    }
}

// class ProductoStockController extends Controller
// {
//     public function index()
//     {
//         // Assuming you have a 'stock' column to determine no-stock products
//         $produknostoks = produknostok::where('stock', 0)->count(); // Adjust the condition as needed

//         return view('produknostok.index', compact('produknostoks'));
//     }

// }
