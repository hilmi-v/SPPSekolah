<x-layout>

    <div class="mb-5 mt-4 flex justify-between">
        <div>
            <h1 class="text-4xl font-bold"> nama </h1>
        </div>
        <div>
            <h1 class="text-xl font-bold"> {{ now()->format('d F o') }} </h1>
        </div>
    </div>
    <div class="mb-5 w-full">
        <button class="text-md rounded-lg bg-blue-800 px-2 py-1 font-bold text-white">
            <a href="{{ route('data-siswa') }}"> &lt; back</a>
        </button>
    </div>

    <div>
        <p class="text-2xl">create siswa:</p>
    </div>

    <div class="mt-3 rounded-xl bg-gray-200 p-4">
        <form action="{{ route('store-siswa') }}" method="POST">
            @csrf
            <div class="my-5">
                <label for="nisn" class="mb-3 block">NISN : </label>
                <input type="number" id="nisn" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    name="nisn" value="{{ old('nisn') }}">
                @error('nisn')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="nis" class="mb-3 block">NIS : </label>
                <input type="number" id="nis" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    name="nis" value="{{ old('nis') }}">
                @error('nis')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="nama" class="mb-3 block">Nama : </label>
                <input type="text" id="nama" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    name="nama" value="{{ old('nama') }}">
                @error('nama')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="id_kelas" class="mb-3 block">Kelas :</label>
                <select name="id_kelas" id="id_kelas" class="w-full rounded-lg border-0 shadow-sm ring-0" required>
                    @foreach ($kelass as $kelas)
                        <option value="{{ $kelas->id_kelas }}" @selected(old('id_kelas') == $kelas->id_kelas)>
                            {{ $kelas->nama_kelas }} | {{ $kelas->kompetensi_keahlian }}
                        </option>
                    @endforeach
                </select>
                @error('id_kelas')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="id_spp" class="mb-3 block">SPP</label>
                <select name="id_spp" id="id_spp" class="w-full rounded-lg border-0 shadow-sm ring-0" required>
                    @foreach ($spps as $spp)
                        <option value="{{ $spp->id_spp }}" @selected(old('id_spp') == $spp->id_spp)>
                            {{ $spp->tahun }} | {{ $spp->nominal }}
                        </option>
                    @endforeach
                </select>
                @error('id_spp')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="no_telp" class="mb-3 block">No Telp :</label>
                <input type="tel" id="no_telp" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    name="no_telp" value="{{ old('no_telp') }}">
                @error('no_telp')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="alamat" class="mb-3 block">Alamat :</label>
                <input type="text" id="alamat" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    name="alamat" value="{{ old('alamat') }}">
                @error('alamat')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-10 flex justify-end">
                <input type="submit" value="Submit" class="mr-2 rounded-md bg-red-700 px-2 py-1 text-white">
            </div>
        </form>
    </div>

</x-layout>

