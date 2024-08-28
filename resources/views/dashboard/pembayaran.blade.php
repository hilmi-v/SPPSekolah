<x-layout>

    <div class="mb-14 mt-4 flex justify-between">
        <div>
            <h1 class="text-4xl font-bold"> nama </h1>
        </div>
        <div>
            <h1 class="text-xl font-bold"> {{ now()->format('d F o') }} </h1>
        </div>
    </div>

    <div>
        <p class="text-2xl">Pembayaran SPP :</p>
    </div>

    <div class="mt-3 rounded-xl bg-slate-200 p-4">
        <form action="{{ route('create-pembayaran') }}" method="GET">
            <div class="my-5">
                <label for="" class="mb-3 block">NISN : </label>
                <input type="number" class="w-full rounded-lg border-0 shadow-sm ring-0" name="nisn" required
                    placeholder="masukkan nisn siswa" value="{{ old('nisn') }}">
            </div>
            <div class="mt-10 flex justify-end">
                <input type="submit" value="Submit" class="mr-2 rounded-md bg-red-700 px-2 py-1 text-white">
            </div>
        </form>
    </div>

</x-layout>

