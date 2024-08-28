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
        <button class="text-md rounded-lg bg-blue-800 px-2 py-1 font-bold text-white"><a href="{{ route('data-kelas') }}">
                < back</a></button>
    </div>

    <div>
        <p class="text-2xl">Edit SPP:</p>
    </div>

    <div class="mt-3 rounded-xl bg-gray-200 p-4">
        <form action="{{ route('update-spp', ['id' => $spp->id_spp]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-5">
                <label for="" class="mb-3 block">tahun : </label>
                <input type="number" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    value="{{ $spp->tahun }}" name="tahun">
            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">kompetensi keahlian : </label>
                <input type="number" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    value="{{ $spp->nominal }}" name="nominal">
            </div>
            <div class="mt-10 flex justify-end">
                <input type="submit" value="Submit" class="mr-2 rounded-md bg-red-700 px-2 py-1 text-white">
            </div>
        </form>
    </div>

</x-layout>

