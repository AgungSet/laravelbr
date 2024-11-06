<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $produks = Produk::count();
        $kategoris = Kategori::count();
        return view('Dashboard.index', compact('produks', 'kategoris'));
    }
}
