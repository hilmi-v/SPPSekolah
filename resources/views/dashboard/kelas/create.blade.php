<x-layout>

    <div class="flex justify-between mt-4 mb-5">
        <div>
            <h1 class="text-4xl font-bold"> nama </h1>
        </div>
        <div>
            <h1 class="text-xl font-bold"> {{ now()->format('d F o') }} </h1>
        </div>
    </div>
    <div class="w-full mb-5">
        <button class="px-2 py-1 font-bold text-white bg-blue-800 rounded-lg text-md"><a href="{{ route('data-kelas') }}">
                < back</a></button>
    </div>

    <div>
        <p class="text-2xl">create SPP:</p>
    </div>

    <div class="p-4 mt-3 bg-gray-200 rounded-xl">
        <form action="{{ route('store-kelas') }}" method="POST">
            @csrf
            @method('POST')
            <div class="my-5">
                <label for="" class="block mb-3">nama kelas : </label>
                <input type="text" class="w-full border-0 rounded-lg shadow-sm ring-0" required
                    value="{{ old('nama_kelas') }}" name="nama_kelas">
            </div>
            <div class="my-5">
                <label for="" class="block mb-3">kompetensi keahlian : </label>
                <input type="text" class="w-full border-0 rounded-lg shadow-sm ring-0" required
                    value="{{ old('kompetensi_keahlian') }}" name="kompetensi_keahlian">
            </div>
            <div class="flex justify-end mt-10">
                <input type="submit" value="Submit" class="px-2 py-1 mr-2 text-white bg-red-700 rounded-md">
            </div>
        </form>
    </div>

</x-layout>

