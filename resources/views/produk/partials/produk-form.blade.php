<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <label for="produk" :value="__('Produk')"> Produk</label>
                <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', optional($produk ?? null)->kategori) }}" class="mt-1 block w-full" />
            </div>
        </div>
        <div>
            <label for="tanggal">tanggal</label>
            <input id="tanggal" name="tanggal" type="date" class="mt-1 block w-full"value={{ old('tanggal', optional($produk ?? null)->tanggal ? $produk->tanggal : '') }}></input>
        </div>
        <div>
            <label for="harga">harga</label>
            <input id="harga" name="harga" type="number" class="mt-1 block w-full"value={{ old('harga', optional($produk ?? null)->harga ? $produk->harga : '') }}></input>
        </div>
        <div>
            <label for="stok">stok</label>
            <input id="stok" name="stok" type="number" class="mt-1 block w-full" value={{ old('stok', optional($produk ?? null)->stok ? $produk->stok : '') }}></input>
        </div>
        {{-- FIELD OPTION KATEGORI --}}
        <div class="flex-1">
            <label for="id_kategori">kategori</label>
            <select id="id_kategori" name="id_kategori">
                <option value="">-- Pilih kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_kategori', $produk->id_kategori ?? '') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>
</section>
