<x-layout>

    <div class="mb-14 mt-4 flex justify-between">
        <div>
            <h1 class="text-4xl font-bold"> nama </h1>
        </div>
        <div>
            <h1 class="text-xl font-bold"> {{ now()->format('d F o') }} </h1>
        </div>
    </div>

    <div class="mb-5 w-full">
        <button class="text-md rounded-lg bg-blue-800 px-2 py-1 font-bold text-white">
            <a href="{{ route('pembayaran') }}"> &lt; back</a>
        </button>
    </div>

    <div>
        <p class="text-2xl">Pembayaran SPP :</p>
    </div>

    <div class="mt-3 rounded-xl bg-slate-200 p-4">
        <form action="{{ route('store-pembayaran') }}" method="POST">
            @csrf
            <div class="my-5">
                <table class="border-separate border-spacing-10 text-lg">
                    <tr>
                        <th>NISN </th>
                        <td>: {{ $data->nisn }}</td>
                        <input type="hidden" name="nisn" value="{{ $data->nisn }}">

                    </tr>
                    <tr>
                        <th>Nama </th>
                        <td>: {{ $data->nama }}</td>
                    </tr>
                    <tr>
                        <th>kelas </th>
                        <td>: {{ $data->kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <th>spp </th>
                        <td>: {{ $data->spp->tahun }} | Rp.{{ $data->spp->nominal }}</td>
                    </tr>
                </table>

            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">Tahun :</label>
                <input type="number" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    value="{{ old('tahun_dibayar') }}" name="tahun_dibayar">
                @error('tahun_dibayar')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">Bulan :</label>
                <select name="bulan_dibayar" id="" class="w-full rounded-lg border-0 shadow-sm ring-0"
                    required>
                    <option value="Januari">Januari</option>
                    <option value="Februari">Februari</option>
                    <option value="Maret">Maret</option>
                    <option value="April">April</option>
                    <option value="Mei">Mei</option>
                    <option value="Juni">Juni</option>
                    <option value="Juli">Juli</option>
                    <option value="Agustus">Agustus</option>
                    <option value="September">September</option>
                    <option value="Oktober">Oktober</option>
                    <option value="November">November</option>
                    <option value="Desember">Desember</option>
                </select>
                @error('bulan_dibayar')
                    <div class="text-red-600">{{ $message }}</div>
                @enderror
            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">Nominal :</label>
                <input type="number" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    value="{{ old('jumlah_bayar') }}" name="jumlah_bayar">
                @error('jumlah_bayar')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-10 flex justify-end">
                <input type="submit" value="Submit" class="mr-2 rounded-md bg-red-700 px-2 py-1 text-white">
            </div>
        </form>
    </div>

</x-layout>

