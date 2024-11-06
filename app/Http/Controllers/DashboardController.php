<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Member;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $produks = Produk::count();
        $kategoris = Kategori::count();
        $transaksis = Transaksi::count();
        $members = Member::count();
        return view('Dashboard.index', compact('produks', 'kategoris', 'transaksis', 'members'));
    }
}
