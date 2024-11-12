<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* CSS untuk memastikan footer selalu di bagian bawah */
        body,
        html {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            flex: 1;
        }
    </style>
</head>

<body>
    <!-- Header with logo and navigation -->
    <header class="bg-dark text-white">
        <div class="container py-3 d-flex justify-content-between align-items-center">
            <!-- Logo Gambar di kiri -->
            <a href="/" class="text-gold text-decoration-none d-flex align-items-center">
                <!-- Ganti dengan gambar logo Anda -->
                <img src="{{ asset('img/mb.png') }}" alt="Muria Batik Logo" class="logo-img" style="height: 50px; width: auto;">

            </a>

            <!-- Navigation Bar -->
            <nav>
                <a href="{{ route('umum.index') }}" class="text-dark me-3 btn btn-warning btn-gold-hover">Home</a>
                <a href="{{ route('umum.produk') }}" class="text-dark me-3 btn btn-warning btn-gold-hover">Produk</a>
                <a href="{{ route('umum.kategori') }}" class="text-dark me-3 btn btn-warning btn-gold-hover">Kategori</a>
            </nav>

            <!-- Keranjang Icon with Item Count -->
            <div class="d-flex align-items-center">
                <p class="text-6xl font-bold mb-4 me-3" style="font-size: 2rem;">{{ $keranjangs->count() }}</p>

                <a href="{{ route('keranjang.index') }}" class="relative bg-gold text-black p-3 rounded-full hover:bg-yellow-600 transition mt-2">
                    <!-- Ikon keranjang -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4m1.6 8l1.3 5.2a1 1 0 001 .8h9.4a1 1 0 001-.8l1.3-5.2M10 21a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z" />
                    </svg>
                </a>
                <a href="{{ route('profile.index') }}" class="relative bg-gold text-black p-3 rounded-full hover:bg-yellow-600 transition mt-2">
                    <!-- Ikon user -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 12c2.28 0 4.14-1.86 4.14-4.14S14.28 3.72 12 3.72 7.86 5.58 7.86 8.86 9.72 12 12 12zm0 1.71c-2.48 0-7.14 1.24-7.14 3.72v2.14h14.28v-2.14c0-2.48-4.66-3.72-7.14-3.72z" />
                    </svg>


            </div>


        </div>
    </header>

    <!-- CSS tambahan -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .btn-gold-hover {
            background-color: #f39c12;
            color: white;
            font-weight: 600;
            border-radius: 5px;
            padding: 10px 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-gold-hover:hover {
            background-color: #e67e22;
            transform: translateY(-2px);
        }

        .logo-img {
            width: auto;
            height: 50px;
            /* Sesuaikan dengan tinggi logo Anda */
        }

        .bg-dark {
            background-color: #333 !important;
        }

        .text-gold {
            color: #f39c12 !important;
        }

        .bg-gold {
            background-color: #f39c12;
        }

        .bg-gold:hover {
            background-color: #e67e22;
        }

        .relative {
            position: relative;
        }

        /* Keranjang icon style */
        .absolute {
            position: absolute;
        }

        /* Additional styles for navigation bar buttons */
        .nav a {
            text-decoration: none;
            font-weight: 500;
        }
    </style>






    </div>
    </header>

    <style>
        /* Warna-warna khusus */
        .bg-dark {
            background-color: #2f2f2f !important;
            /* Abu gelap */
        }

        .text-gold {
            color: #d4af37 !important;
            /* Emas */
        }

        .bg-gold {
            background-color: #d4af37 !important;
            /* Emas untuk badge */
        }
    </style>


    <!-- Main catalog container -->
    <div class="container my-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-dark mt-auto">
        <div class="container text-center">
            <small>Muria Batik &copy; 2024 kerajinan batik asli Kudus</small>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
