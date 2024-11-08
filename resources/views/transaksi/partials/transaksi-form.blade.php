<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex-1">
            <label for="id_member">Member</label>
            <select id="id_member" name="id_member">
                <option value="">-- Pilih Member --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ old('id_member', $transaksi->id_member ?? '') == $member->id ? 'selected' : '' }}>
                        {{ $member->nama_member }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- FIELD OPTION produk --}}
        <div class="flex-1">
            <label for="id_produk">produk</label>
            <select id="id_produk" name="id_produk">
                <option value="">-- Pilih produk --</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}" {{ old('id_produk', $transaksi->id_produk ?? '') == $produk->id ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="harga">harga</label>
            <input id="harga" name="harga" type="number" class="mt-1 block w-full"value={{ old('harga', optional($transaksi ?? null)->harga ? $transaksi->harga : '') }}>
        </div>
        <div>
            <label for="total">total</label>
            <input id="total" name="total" type="number" class="mt-1 block w-full"value={{ old('total', optional($transaksi ?? null)->total ? $transaksi->total : '') }}>
        </div>


    </div>
</section>
