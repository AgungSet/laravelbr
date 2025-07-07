@php
    $kategoris = \App\Models\Kategori::all();
@endphp
<footer class="bg-dark text-white mt-auto py-4">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-md-3 mb-3">
                <h5 class="text-uppercase fw-bold">Muria Batik</h5>
                <p>Batik asli Kudus dengan berbagai pilihan motif eksklusif yang memadukan tradisi dan inovasi.</p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 mb-3">
                <h5 class="text-uppercase fw-bold">Navigasi Cepat</h5>
                <ul class="list-unstyled">
                    <li><a href="/produk" class="text-white text-decoration-none">Produk</a></li>
                    <li><a href="/tentang-kami" class="text-white text-decoration-none">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- Kategori -->
            <div class="col-md-3 mb-3">
                <h5 class="text-uppercase fw-bold">Kategori</h5>
                <ul class="list-unstyled">
                    @foreach ($kategoris as $kategori)
                        <li>
                            <a href="{{ route('umum.produk', ['kategori' => $kategori->id]) }}" class="text-white text-decoration-none">
                                {{ $kategori->nama_kategori }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-3 mb-3">
                <h5 class="text-uppercase fw-bold">Kontak Kami</h5>
                <p><i class="bi bi-geo-alt"></i> Kudus, Jawa Tengah, Indonesia</p>
                <p><i class="bi bi-envelope"></i> info@muriabatik.com</p>
                <p><i class="bi bi-phone"></i> +62 812-3456-7890</p>
                <div class="d-flex gap-2">
                    <a href="https://wa.me/6281234567890" class="text-white" target="_blank"><i class="bi bi-whatsapp"></i></a>
                    <a href="https://www.instagram.com/muriabatik" class="text-white" target="_blank"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.tiktok.com/@muriabatik" class="text-white" target="_blank">
                        <i class="bi bi-tiktok"></i>
                    </a>
                    <a href="https://shopee.co.id/muriabatik" class="text-white" target="_blank">
                        <i class="bi bi-bag"></i> <!-- Gunakan ikon khusus jika ada untuk Shopee -->
                    </a>
                    <a href="https://www.tokopedia.com/muriabatik" class="text-white" target="_blank">
                        <i class="bi bi-shop"></i> <!-- Gunakan ikon khusus jika ada untuk Tokopedia -->
                    </a>

                </div>
            </div>

        </div>
        <hr class="bg-white">
        <div class="text-center">
            <small>&copy; 2024 Muria Batik. Semua Hak Cipta Dilindungi.</small>
        </div>
    </div>
</footer>
