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
        <button class="text-md rounded-lg bg-blue-800 px-2 py-1 font-bold text-white"><a href="{{ route('data-siswa') }}">
                < back</a></button>
    </div>

    <div>
        <p class="text-2xl">edit petugas :</p>
    </div>

    <div class="mt-3 rounded-xl bg-gray-200 p-4">
        <form action="{{ route('update-petugas', ['id' => $petugas->id_petugas]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-5">
                <label for="" class="mb-3 block">Username : </label>
                <input type="text" class="w-full rounded-lg border-0 shadow-sm ring-0" required name="username"
                    value="{{ $petugas->username }}">
                @error('username')
                    <p class="text-red-600"> {{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">Nama petugas : </label>
                <input type="text" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    value="{{ $petugas->nama_petugas }}" name="nama_petugas">
                @error('nama_petugas')
                    <p class="text-red-600"> {{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">Level :</label>
                <select name="level" id="" class="w-full rounded-lg border-0 shadow-sm ring-0" required>
                    <option value="{{ $petugas->level }}" selected>{{ $petugas->level }}</option>
                    <option id="" value="admin">Admin</option>
                    <option id="" value="petugas">Petugas</option>
                </select>
                @error('level')
                    <p class="text-red-600"> {{ $message }}</p>
                @enderror
            </div>
            <div class="mt-10 flex justify-end">
                <input type="submit" value="Submit" class="mr-2 rounded-md bg-red-700 px-2 py-1 text-white">
            </div>
        </form>
    </div>

</x-layout>

