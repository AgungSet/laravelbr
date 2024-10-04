@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <strong class="transaksi" title="Transaksi">Transaksi</strong>
        </div>
        <style>
            .transaksi {
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
            <title>Form Input Transaksi</title>
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

            <h2>Form Input Transaksi</h2>

            <form action="" method="post">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>

                <label for="nomor">Nomor:</label>
                <input type="text" id="nomor" name="nomor" required>

                <label for="produk">Produk (int):</label>
                <input type="number" id="produk" name="produk" required>

                <label for="jumlah">Jumlah:</label>
                <input type="number" id="jumlah" name="jumlah" required>

                <label for="total">Total Pembayaran:</label>
                <select id="total" name="total" required>
                    <option value="cash">Cash</option>
                    <option value="transfer">Transfer</option>
                </select>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Ambil data dari form
                $nama = htmlspecialchars($_POST['nama']);
                $nomor = htmlspecialchars($_POST['nomor']);
                $produk = (int) $_POST['produk'];
                $jumlah = (int) $_POST['jumlah'];
                $total = htmlspecialchars($_POST['total']);

                // Hitung total pembayaran
                $total_pembayaran = $produk * $jumlah;

                // Tampilkan hasil
                echo '<h3>Detail Transaksi:</h3>';
                echo "<p>Nama: $nama</p>";
                echo "<p>Nomor: $nomor</p>";
                echo "<p>Produk: $produk</p>";
                echo "<p>Jumlah: $jumlah</p>";
                echo "<p>Total Pembayaran: $total_pembayaran</p>";
                echo "<p>Metode Pembayaran: $total</p>";
            }
            ?>

        </body>
    </div>
@endsection
