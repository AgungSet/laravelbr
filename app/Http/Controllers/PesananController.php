<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\member;
use App\Models\Produknostok;
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
        $produknostoks = Produknostok::all();
        $members = member::all();
        return view('pesanan.create', compact('produknostoks', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produknostok' => 'required',
            'nama_customer' => 'required',
            'harga' => 'required',
            'total' => 'required',


        ]);
        pesanan::create([
            'id_produknostok' => $request->id_produknostok,
            'nama_customer' => $request->nama_customer,
            'harga' => $request->harga,
            'total' => $request->total,



        ]);
        return redirect()->route('pesanan.index')->with('success', 'pesanan created successfully.');
    }

    public function edit(pesanan $pesanan): View
    {
        $produknostoks = Produknostok::all();
        return view('pesanan.edit', compact('pesanan', 'produknostoks'));
    }

    public function update(Request $request, pesanan $pesanan)
    {
        $request->validate([
            'nama_customer' => 'required',
            'id_produknostok' => 'required',
            'harga' => 'required',
            'total' => 'required',

        ]);
        $pesanan->update([
            'nama_customer' => $request->nama_customer,
            'id_produknostok' => $request->id_produknostok,

            'harga' => $request->harga,
            'total' => $request->total,

        ]);
        return redirect()->route('pesanan.index')->with('success', 'transakai update successfully.');
    }
    public function updateterbayar(pesanan $pesanan)
    {
        $pesanan->update([
            'status_pesanan' => 'Terbayar',
        ]);
        return redirect()->route('pesanan.index')->with('success', 'transakai update successfully.');
    }
    public function updateselesai(pesanan $pesanan)
    {
        $pesanan->update([
            'status_pesanan' => 'Selesai',
        ]);
        return redirect()->route('pesanan.index')->with('success', 'transakai update successfully.');
    }
    public function destroy(pesanan $pesanan)
    {
        $pesanan->delete();
        return to_route('pesanan.index');
    }
}
