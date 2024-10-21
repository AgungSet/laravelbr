<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <label for="transaksi" :value="__('transaksi')"> transaksi</label>
                <input type="text" id="nama_transaksi" name="nama_transaksi" value="{{ old('nama_transaksi', optional($transaksi ?? null)->kategori) }}" class="mt-1 block w-full" />
            </div>
        </div>
        <div>
            <label for="tanggal">tanggal</label>
            <textarea id="tanggal" name="tanggal" type="text" class="mt-1 block w-full">{{ old('tanggal', optional($transaksi ?? null)->tanggal ? $transaksi->tanggal : '') }}</textarea>
        </div>
        <div>
            <label for="harga">harga</label>
            <textarea id="harga" name="harga" type="text" class="mt-1 block w-full">{{ old('harga', optional($transaksi ?? null)->harga ? $transaksi->harga : '') }}</textarea>
        </div>
        <div>
            <label for="stok">stok</label>
            <textarea id="stok" name="stok" type="text" class="mt-1 block w-full">{{ old('stok', optional($transaksi ?? null)->stok ? $transaksi->stok : '') }}</textarea>
        </div>

    </div>
    <div class="flex flex-col md:flex-row flex-wrap gap-4">
    </div>
</section>
