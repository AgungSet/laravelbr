<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <label for="pesanan" :value="__('pesanan')"> Nama Pemesan</label>
                <input type="text" id="nama_pesanan" name="nama_pesanan" value="{{ old('nama_pesanan', optional($pesanan ?? null)->nama_pesanan) }}" class="mt-1 block w-full" />
            </div>
        </div>
        <div>
            <label for="harga">harga</label>
            <input id="harga" name="harga" type="number" class="mt-1 block w-full"value={{ old('harga', optional($pesanan ?? null)->harga ? $pesanan->harga : '') }}></input>
        </div>
        <div>
            <label for="jumlah">jumlah</label>
            <input id="jumlah" name="jumlah" type="number" class="mt-1 block w-full" value={{ old('jumlah', optional($pesanan ?? null)->jumlah ? $pesanan->jumlah : '') }}></input>
        </div>
        <div>
            <label for="total">total</label>
            <input id="total" name="total" type="number" class="mt-1 block w-full" value={{ old('total', optional($pesanan ?? null)->total ? $pesanan->total : '') }}></input>
        </div>
        <div>
            <label for="deskripsi">deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" type="text" class="mt-1 block w-full">{{ old('deskripsi', optional($pesanan ?? null)->deskripsi ? $pesanan->deskripsi : '') }}</textarea>
        </div>
        <div>
            <label for="foto">foto pesanan</label>
            <input type="file" name="foto" class="mt-1 block w-full" value="{{ old('foto', optional($pesanan ?? null)->foto ? $pesanan->foto : '') }}"></input>
        </div>
        {{-- FIELD OPTION KATEGORI --}}
        <div class="flex-1">
            <label for="id_kategori">kategori</label>
            <select id="id_kategori" name="id_kategori">
                <option value="">-- Pilih kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_kategori', $pesanan->id_kategori ?? '') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>
</section>
