<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div>
            <label for="nama_member">Nama Member</label>
            <input id="nama_member" name="nama_member" type="text" class="mt-1 block w-full"value={{ old('nama_member', optional($member ?? null)->nama_member ? $member->nama_member : '') }}>
        </div>
        <div>
            <label for="alamat">Alamat</label>
            <input id="alamat" name="alamat" type="text" class="mt-1 block w-full" value="{{ old('alamat', optional($member ?? null)->alamat ? $member->alamat : '') }}">
        </div>
        <div>
            <label for="harga">harga</label>
            <input id="harga" name="harga" type="number" class="mt-1 block w-full"value={{ old('harga', optional($member ?? null)->harga ? $member->harga : '') }}>
        </div>
        <div>
            <label for="total">total</label>
            <input id="total" name="total" type="number" class="mt-1 block w-full"value={{ old('total', optional($member ?? null)->total ? $member->total : '') }}>
        </div>


    </div>
</section>
