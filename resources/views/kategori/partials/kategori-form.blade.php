<section class="p-4 sm:p-8 bg-white shadow rounded-lg">
    <div class="flex flex-col mt-4 gap-6">
        <div class="flex flex-col md:flex-row flex-wrap gap-4">
            <div class="flex-1">
                <label for="nama_kategori" :value="__('Nama kategori')"> Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', optional($kategori ?? null)->nama_kategori) }}" class="mt-1 block w-full" />
            </div>
        </div>
        <div>
            <label for="deskripsi">deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" type="text" class="mt-1 block w-full">{{ old('deskripsi', optional($kategori ?? null)->deskripsi ? $kategori->deskripsi : '') }}</textarea>
        </div>
    </div>
</section>
