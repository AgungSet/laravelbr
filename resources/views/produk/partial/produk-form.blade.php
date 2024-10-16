<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <label for="produk" :value="__('Produk')"> Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', optional($produk ?? null)->kategori) }}" class="mt-1 block w-full" />
            </div>
        </div>
        <div>
            <label for="deskripsi">deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" type="text" class="mt-1 block w-full">{{ old('deskripsi', optional($produk ?? null)->deskripsi ? $produk->deskripsi : '') }}</textarea>
        </div>
    </div>
</section>
