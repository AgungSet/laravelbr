@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <strong class="transaksi" title="Transaksi">Produk</strong>
        </div>
        <style>
            .produk {
                color: black;
                font-size: 25px;
            }
        </style>
    </header>

    <div class="container">
        <html lang="id">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Form Input Produk</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 20px;
                }

                input,
                select {
                    margin-bottom: 10px;
                    padding: 10px;
                    width: 100%;
                }
            </style>
        </head>

        <body>

            <h2>Form Input Produk</h2>

            <form action="" method="post">
                label for="id">id:</label>
                <input type="number" id="nama" name="nama" required>

                <label for="tanggal">tanggal:</label>
                <input type="date" id="tanggal" name="tanggal" required>

                <label for="nama produk">namaproduk:</label>
                <input type="text" id="namaproduk" name="namaproduk" required>

                <label for="harga">harga:</label>
                <input type="number" id="harga" name="harga" required>

                <label for="stok">stok:</label>
                <input type="number" id="stok" name="stok" required>

                <label for="kategori">kategori:</label>
                <input type="text" id="kategori" name="kategori" required>

                </select>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Ambil data dari form
                $tanggal = (int) $_POST['tanggal'];
                $namaproduk = (int) $_POST['namaproduk'];
                $harga = (int) $_POST['harga'];
                $stok = (int) $_POST['stok'];
                $kategori = (string) $_POST['kategori'];
                // Hitung total pembayaran
                $total_pembayaran = $produk * $jumlah;
            
                // Tampilkan hasil
                echo '<h3>Detail produk:</h3>';
                echo "<p>id: $id</p>";
                echo "<p>tanggal: $tanggal</p>";
                echo "<p>namaproduk: $namaproduk</p>";
                echo "<p>harga: $harga</p>";
                echo "<p>stok: $stok</p>";
                echo "<p>kategori: $kategori</p>";
            }
            ?>

        </body>
    </div>
@endsection
