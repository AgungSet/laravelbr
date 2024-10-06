@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <strong class="produk" title="Produk">Produk</strong>
        </div>
        <style>
            .produk {
                color: black;
                font-size: 25px;
            }

            .form-container {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
                max-width: 800px;
                margin: 0 auto;
            }

            .form-container label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            .form-container input {
                padding: 10px;
                width: 100%;
                margin-bottom: 20px;
            }

            .form-container .form-item {
                display: flex;
                flex-direction: column;
            }

            .form-container button {
                grid-column: span 2;
                padding: 10px 20px;
                background-color: #4CAF50;
                color: white;
                border: none;
                cursor: pointer;
                text-align: center;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 15px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            .container {
                margin: 40px auto;
                max-width: 1200px;
            }
        </style>
    </header>

    <div class="container">
        <h2>Form Input Produk</h2>

        <form action="" method="POST">
            @csrf
            <div class="form-container">
                <div class="form-item">
                    <label for="id">ID:</label>
                    <input type="number" id="id" name="id" required>
                </div>

                <div class="form-item">
                    <label for="tanggal">Tanggal:</label>
                    <input type="date" id="tanggal" name="tanggal" required>
                </div>

                <div class="form-item">
                    <label for="namaproduk">Nama Produk:</label>
                    <input type="text" id="namaproduk" name="namaproduk" required>
                </div>

                <div class="form-item">
                    <label for="harga">Harga:</label>
                    <input type="number" id="harga" name="harga" required>
                </div>

                <div class="form-item">
                    <label for="stok">Stok:</label>
                    <input type="number" id="stok" name="stok" required>
                </div>

                <div class="form-item">
                    <label for="kategori">Kategori:</label>
                    <input type="text" id="kategori" name="kategori" required>
                </div>

                <button type="submit">Submit</button>
            </div>
        </form>

        <h2>Daftar Produk</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                </tr>
            </thead>
            <tbody>
                @if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    <tr>
                        <td>{{ $_POST['id'] }}</td>
                        <td>{{ $_POST['tanggal'] }}</td>
                        <td>{{ $_POST['namaproduk'] }}</td>
                        <td>{{ $_POST['harga'] }}</td>
                        <td>{{ $_POST['stok'] }}</td>
                        <td>{{ $_POST['kategori'] }}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="6">Belum ada produk yang dimasukkan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
