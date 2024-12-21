@extends('umum.layouts.app')
@section('content')
    <!-- Container Selamat Datang -->
    <div class="text-center my-5" style="background-color: #f8f9fa; padding: 30px; border-radius: 10px; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);">
        <h1 style="font-family: 'Georgia', serif; font-size: 2.5em; color: #333;">
            SELAMAT DATANG DI MURIA BATIK KUDUS
        </h1>
        <p class="lead" style="font-size: 1.2em; color: #555;">
            Temukan koleksi batik terbaik Anda di Batik Kudus ini.
        </p>
    </div>
    <!-- Banner Slider -->
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($produks as $produk)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{ asset($produk->foto) }}" class="d-block w-100" alt="{{ $produk->nama_produk }}" style="height: 400px; object-fit: cover;">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $produk->nama_produk }}</h5>
                        <p>{{ $produk->deskripsi_produk }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Tombol Aksi Belanja di bawah Banner -->
    <div class="d-flex justify-content-center gap-4 my-5">
        <a href="{{ route('umum.produk') }}" class="btn btn-primary btn-lg" style="font-size: 1.1em; padding: 15px 30px;">Belanja Sekarang</a>
        <a href="{{ route('umum.produknostok') }}" class="btn btn-warning btn-lg" style="font-size: 1.1em; padding: 15px 30px;">Pesan Produk</a>
    </div>
    <div class="d-flex align-items-center my-4" style="gap: 20px;">
        <!-- Gambar -->
        <img src="{{ asset('img/MBPAGE.png') }}" alt="Batik Kudus" class="img-fluid rounded" style="width: 50%; border: 3px solid #ddd; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">

        <!-- Teks -->
        <div>
            <h2 class="mb-4" style="font-family: 'Georgia', serif; color: #333;">Batik Kudus</h2>
            <p style="text-indent: 30px; line-height: 1.8; color: #555;">
                Pada tahun 1900an batik kudus mengalami kejayaan namun pada akhirnya mulai dilupakan dan, pada tahun 2005, Yuli Arstuti sebagai pemilik Muria Batik Kudus, mulai melakukan penelitian dan upaya pelestarian terhadap motif-motif khas Kudus. Melalui dedikasinya, motif-motif khas Kudus berhasil bangkit kembali dan mendapatkan apresiasi yang lebih luas.
            </p>
            <p style="text-indent: 30px; line-height: 1.8; color: #555;">
                Batik Kudus merupakan salah satu jenis batik pesisir yang memiliki komposisi warna-warna yang terinspirasi oleh kehidupan di daerah pesisir. Warna-warna yang dominan adalah biru laut, hijau daun, cokelat pasir, dan nuansa warna-warna alam lainnya.
            </p>
            <p style="text-indent: 30px; line-height: 1.8; color: #555;">
                Salah satu ciri khas dari kain ini adalah keberagaman motif yang ada. Beberapa motif terkenal yang menjadi identitas tersendiri antara lain motif Parijhoto, motif Kapal Kandas, motif Cengkeh, dan masih banyak lagi.
            </p>
            <p style="text-indent: 30px; line-height: 1.8; color: #555;">
                Keberhasilan Yuli Arstuti dalam menghidupkan kembali batik Kudus menjadi sebuah inspirasi bagi para perajin dan pecinta batik di Kudus.
            </p>
        </div>
    </div>
@endsection
