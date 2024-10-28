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
            <label for="no_hp">no_hp</label>
            <input id="no_hp" name="no_hp" type="number" class="mt-1 block w-full" value="{{ old('no_hp', optional($member ?? null)->no_hp ? $member->no_hp : '') }}">
        </div>
        <div>
            <label for="instagram">instagram</label>
            <input id="instagram" name="instagram" type="text" class="mt-1 block w-full" value="{{ old('instagram', optional($member ?? null)->instagram ? $member->instagram : '') }}">
        </div>


    </div>
</section>
