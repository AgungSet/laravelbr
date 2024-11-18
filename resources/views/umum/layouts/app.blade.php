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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <!-- Menambahkan CSS tambahan untuk styling -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .text-center {
            text-align: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .col-md {
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card-img-top:hover {
            transform: scale(1.1);
        }

        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #777;
            margin-bottom: 15px;
        }

        .price {
            font-size: 1.25rem;
            font-weight: 600;
            color: #e74c3c;
            margin-top: auto;
        }

        .btn-gold {
            background-color: #f39c12;
            color: #fff;
            font-weight: 600;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-gold:hover {
            background-color: #e67e22;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .col-md {
                flex: 1 1 calc(50% - 20px);
            }
        }

        @media (max-width: 576px) {
            .col-md {
                flex: 1 1 100%;
            }
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
                <a href="{{ route('umum.pesanan') }}" class="text-dark me-3 btn btn-warning btn-gold-hover">Pesanan</a>
                <a href="{{ route('umum.transaksi') }}" class="text-black me-3 btn" style="background-color: #ffffff; border: 1px solid #919191; padding: 10px 20px; border-radius: 8px;">
                    Transaksi Saya
                </a>


            </nav>

            <!-- Keranjang Icon with Item Count -->
            <div class="d-flex align-items-center gap-3">
                <!-- Jumlah Item di Keranjang -->
                <p class="fw-bold mb-0" style="font-size: 1.5rem;">
                    {{ $keranjangs->count() }}
                </p>

                <!-- Tombol Keranjang -->
                <a href="{{ route('keranjang.index') }}" class="d-flex align-items-center justify-content-center bg-warning text-black p-3 rounded-circle hover-bg-light transition" style="width: 48px; height: 48px; line-height: 0;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2" />
                    </svg>
                </a>
            </div>

            <div class="d-flex align-items-center justify-content-center flex-wrap gap-3">
                @if (Auth::guard('member')->check())
                    <!-- Username -->
                    <p class="fw-bold text-center mb-0" style="font-size: 1rem;">
                        {{ Auth::guard('member')->user()->username }}
                    </p>

                    <!-- Tombol Edit Profile -->
                    <a href="{{ route('member.profile.edit') }}" class="btn text-black rounded-pill" style="background-color: #fff; border: 1px solid #ccc; padding: 0.5rem 1rem; font-size: 0.875rem;">
                        Edit Profile
                    </a>

                    <!-- Tombol Logout -->
                    <form action="{{ route('umum.logout') }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin logout?');">
                        @csrf
                        <button type="submit" class="btn rounded-pill text-black" style="background-color: #ff4d4d; border: 1px solid #ff0000; padding: 0.5rem 1rem; font-size: 0.875rem;">
                            Logout
                        </button>
                    </form>
                @else
                    <!-- Tombol Login -->
                    <a href="{{ route('umum.login') }}" class="btn text-black rounded-pill" style="background-color: #fff; border: 1px solid #ccc; padding: 0.5rem 1rem; font-size: 0.875rem;">
                        Login
                    </a>
                @endif
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
