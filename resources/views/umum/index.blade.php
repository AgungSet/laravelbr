@extends('umum.layouts.app')

@section('content')
    <!-- Container Selamat Datang -->
    <div class="text-center my-5" style="background-color: #f8f9fa; padding: 0; border-radius: 10px;">
        <h1 style="font-family: 'Georgia', serif; font-size: 2.5em; color: #333;">
            SELAMAT DATANG DI MURIA BATIK KUDUS
        </h1>
        <p class="lead" style="font-size: 1.2em; color: #555;">
            Temukan koleksi batik terbaik Anda di Batik Kudus ini.
        </p>
    </div>
    <div class="d-flex align-items-center my-4" style="gap: 20px;">
        <!-- Gambar -->
        <img src="{{ asset('img/MBPAGE.png') }}" alt="Batik Kudus" class="img-fluid" style="width: 50%; border: 3px solid #ddd;">

        <!-- Teks -->
        <div>
            <h2>Batik Kudus</h2>
            <p style="text-indent: 30px; line-height: 1.6;">
                Pada tahun 1900an batik kudus mengalami kejayaan namun pada akhirnya mulai dilupakan dan, pada tahun 2005, Yuli Arstuti sebagai pemilik Muria Batik Kudus, mulai melakukan penelitian dan upaya pelestarian terhadap motif-motif khas Kudus. Melalui dedikasinya, motif motif khas Kudus berhasil bangkit kembali dan mendapatkan apresiasi yang lebih luas. Yuli Astuti tidak hanya menciptakan kembali motif-motif yang hampir punah, tetapi juga menggabungkannya dengan desain modern, sehingga hasil dari motif motifnya menjadi lebih relevan dan diminati oleh generasi muda.
            </p>
            <p style="text-indent: 30px; line-height: 1.6;">
                Batik Kudus merupakan salah satu jenis batik pesisir yang memiliki komposisi warna-warna yang terinspirasi oleh kehidupan di daerah pesisir. Warna-warna yang dominan adalah biru laut, hijau daun, cokelat pasir, dan nuansa warna-warna alam lainnya. Komposisi warna-warna pesisir ini memberikan kesan segar dan menenangkan pada batik Kudus.
            </p>
            <p style="text-indent: 30px; line-height: 1.6;">
                Salah satu ciri khas dari kain ini adalah keberagaman motif yang ada. Beberapa motif terkenal yang menjadi identitas tersendiri antara lain motif Parijhoto, motif Kapal Kandas, motif Cengkeh, motif Tembakau, motif Tari Kretek, motif air tiga rasa dan masih banyak lagi. Setiap motif tersebut memiliki cerita dan makna tersendiri, yang sering kali menggambarkan kehidupan masyarakat, alam sekitar, atau tradisi lokal yang khas.
            </p>
            <p style="text-indent: 30px; line-height: 1.6;">
                Keberhasilan Yuli Arstuti dalam menghidupkan kembali batik Kudus menjadi sebuah inspirasi bagi para perajin dan pecinta batik di Kudus. Upaya pelestarian dan pengembangan motif-motif batik Kudus terus dilakukan agar warisan budaya ini dapat tetap dikenal dan diapresiasi oleh generasi mendatang. Hal ini menjadikannya sebagai salah satu kekayaan budaya Indonesia yang dapat terus berkembang dan menjadi sumber kebanggaan bagi masyarakat Kudus dan Indonesia secara keseluruhan.
            </p>
        </div>
    @endsection
