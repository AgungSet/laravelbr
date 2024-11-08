<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\member;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function ajax()
    {
        $transaksis = transaksi::all();
        return response()->json($transaksis);
    }

    public function index(): View
    {
        $transaksis = transaksi::orderByDesc('created_at')->paginate(10);

        return view('transaksi.index', compact('transaksis'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create(): View
    {
        $produks = Produk::all();
        $members = member::all();
        return view('transaksi.create', compact('produks', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_produk' => 'required',
            'nama_customer' => 'required',
            'harga' => 'required',
            'total' => 'required',


        ]);
        transaksi::create([
            'id_produk' => $request->id_produk,
            'nama_customer' => $request->nama_customer,
            'harga' => $request->harga,
            'total' => $request->total,



        ]);
        return redirect()->route('transaksi.index')->with('success', 'transaksi created successfully.');
    }

    public function edit(transaksi $transaksi): View
    {
        $produks = Produk::all();
        return view('transaksi.edit', compact('transaksi', 'produks'));
    }

    public function update(Request $request, transaksi $transaksi)
    {
        $request->validate([
            'nama_customer' => 'required',
            'id_produk' => 'required',
            'harga' => 'required',
            'total' => 'required',

        ]);
        $transaksi->update([
            'nama_customer' => $request->nama_customer,
            'id_produk' => $request->id_produk,

            'harga' => $request->harga,
            'total' => $request->total,

        ]);
        return redirect()->route('transaksi.index')->with('success', 'transakai update successfully.');
    }

    public function destroy(transaksi $transaksi)
    {
        $transaksi->delete();
        return to_route('transaksi.index');
    }
}
