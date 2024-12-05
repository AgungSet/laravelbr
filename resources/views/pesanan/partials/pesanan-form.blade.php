<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex-1">
            <label for="id_member">Member</label>
            <select id="id_member" name="id_member">
                <option value="">-- Pilih Member --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ old('id_member', $pesanan->id_member ?? '') == $member->id ? 'selected' : '' }}>
                        {{ $member->nama_member }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- FIELD OPTION produknostok --}}
        <div class="flex-1">
            <label for="id_produknostok">produknostok</label>
            <select id="id_produknostok" name="id_produknostok">
                <option value="">-- Pilih produknostok --</option>
                @foreach ($produknostoks as $produknostok)
                    <option value="{{ $produknostok->id }}" {{ old('id_produknostok', $pesanan->id_produknostok ?? '') == $produknostok->id ? 'selected' : '' }}>
                        {{ $produknostok->nama_produknostok }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="harga">harga</label>
            <input id="harga" name="harga" type="number" class="mt-1 block w-full"value={{ old('harga', optional($pesanan ?? null)->harga ? $pesanan->harga : '') }}>
        </div>
        <div>
            <label for="total">total</label>
            <input id="total" name="total" type="number" class="mt-1 block w-full"value={{ old('total', optional($pesanan ?? null)->total ? $pesanan->total : '') }}>
        </div>


    </div>
</section>
