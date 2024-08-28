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
            <a href="{{ route('history') }}"> &lt; back</a>
        </button>
    </div>

    <div>
        <p class="text-2xl">Edit Pembayaran SPP :</p>
    </div>

    <div class="mt-3 rounded-xl bg-slate-200 p-4">
        <form action="{{ route('update-pembayaran', ['id' => $pembayaran->id_pembayaran]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="my-5">
                <table class="border-separate border-spacing-10 text-lg">
                    <tr>
                        <th>NISN </th>
                        <td>: {{ $pembayaran->nisn }}</td>
                    </tr>
                    <tr>
                        <th>Nama </th>
                        <td>: {{ $pembayaran->siswa->nama }}</td>
                    </tr>
                    <tr>
                        <th>kelas </th>
                        <td>: {{ $pembayaran->siswa->kelas->nama_kelas }}</td>
                    </tr>
                    <tr>
                        <th>spp </th>
                        <td>: {{ $pembayaran->spp->tahun }} | Rp.{{ $pembayaran->spp->nominal }}</td>
                    </tr>
                </table>

            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">Tahun :</label>
                <input type="number" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    value="{{ old('tahun_dibayar', $pembayaran->tahun_dibayar) }}" name="tahun_dibayar">
                @error('tahun_dibayar')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">Bulan :</label>
                <select name="bulan_dibayar" id="" class="w-full rounded-lg border-0 shadow-sm ring-0"
                    required>
                    <option @selected($pembayaran->bulan_dibayar == 'Januari') value="Januari">Januari</option>
                    <option @selected($pembayaran->bulan_dibayar == 'Februari') value="Februari">Februari</option>
                    <option @selected($pembayaran->bulan_dibayar == 'Maret') value="Maret">Maret</option>
                    <option @selected($pembayaran->bulan_dibayar == 'April') value="April">April</option>
                    <option @selected($pembayaran->bulan_dibayar == 'Mei') value="Mei">Mei</option>
                    <option @selected($pembayaran->bulan_dibayar == 'Juni') value="Juni">Juni</option>
                    <option @selected($pembayaran->bulan_dibayar == 'Juli') value="Juli">Juli</option>
                    <option @selected($pembayaran->bulan_dibayar == 'Agustus') value="Agustus">Agustus</option>
                    <option @selected($pembayaran->bulan_dibayar == 'September') value="September">September</option>
                    <option @selected($pembayaran->bulan_dibayar == 'Oktober') value="Oktober">Oktober</option>
                    <option @selected($pembayaran->bulan_dibayar == 'November') value="November">November</option>
                    <option @selected($pembayaran->bulan_dibayar == 'Desember') value="Desember">Desember</option>
                </select>
                @error('bulan_dibayar')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="my-5">
                <label for="" class="mb-3 block">Nominal :</label>
                <input type="number" class="w-full rounded-lg border-0 shadow-sm ring-0" required
                    value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" name="jumlah_bayar">
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

