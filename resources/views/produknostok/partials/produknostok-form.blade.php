<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <label for="produknostok" :value="__('Produknostok')"> Produknostok</label>
                <input type="text" id="nama_produknostok" name="nama_produknostok" value="{{ old('nama_produknostok', optional($produknostok ?? null)->nama_produknostok) }}" class="mt-1 block w-full" />
            </div>
        </div>
        <div>
            <label for="harga">harga</label>
            <input id="harga" name="harga" type="number" class="mt-1 block w-full"value={{ old('harga', optional($produknostok ?? null)->harga ? $produknostok->harga : '') }}></input>
        </div>
        <div>
            <label for="deskripsi">deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" type="text" class="mt-1 block w-full">{{ old('deskripsi', optional($produknostok ?? null)->deskripsi ? $produknostok->deskripsi : '') }}</textarea>
        </div>
        <div>
            <label for="foto">foto produknostok</label>
            <input type="file" name="foto" class="mt-1 block w-full" value="{{ old('foto', optional($produknostok ?? null)->foto ? $produknostok->foto : '') }}"></input>
        </div>
        {{-- FIELD OPTION KATEGORI --}}
        <div class="flex-1">
            <label for="id_kategori">kategori</label>
            <select id="id_kategori" name="id_kategori">
                <option value="">-- Pilih kategori --</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('id_kategori', $produknostok->id_kategori ?? '') == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>
</section>
