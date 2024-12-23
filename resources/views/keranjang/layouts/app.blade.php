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
            <a href="/" class="text-gold text-decoration-none">
                <h1 class="h4 m-0">Keranjang</h1>
            </a>
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
