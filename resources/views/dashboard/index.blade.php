<x-layout>
    <div class="mx-auto">
        {{-- top show username and date --}}
        <div class="mb-12 mt-4 pl-3">
            <h1 class="text-4xl font-bold"> Hi {{ Auth::guard('petugas')->user()->nama_petugas }}</h1>
            <h1 class="text-xl"> {{ now()->format('d F o') }} </h1>
        </div>

        {{-- <div class="flex flex-wrap mx-auto mb-3 text-auto">
            <div class="w-40 h-40 mx-auto bg-red-800 rounded-lg shadow-lg "></div>
            <div class="w-40 h-40 mx-auto bg-red-800 rounded-lg shadow-lg "></div>
            <div class="w-40 h-40 mx-auto bg-red-800 rounded-lg shadow-lg "></div>
            <div class="w-40 h-40 mx-auto bg-red-800 rounded-lg shadow-lg "></div>
        </div> --}}
        {{-- Button for information data --}}
        <div class="mb-10 grid grid-cols-2 gap-5 lg:grid-cols-4">
            <a href="{{ route('data-siswa') }}"
                class="mx-auto flex h-32 w-32 flex-col items-center justify-center rounded-lg bg-red-600 text-white shadow-lg lg:h-40 lg:w-40">
                <h1 class="mb-2 text-center text-3xl font-bold">Siswa</h1>
                <h2 class="mt-2 text-center text-4xl font-black">{{ $totalSiswa }}</h2>
            </a>
            <a href="{{ route('data-petugas') }}"
                class="mx-auto flex h-32 w-32 flex-col items-center justify-center rounded-lg bg-yellow-300 text-white shadow-lg lg:h-40 lg:w-40">
                <h1 class="mb-2 text-center text-3xl font-bold">Petugas</h1>
                <h2 class="mt-2 text-center text-4xl font-black">{{ $totalPetugas }}</h2>
            </a>
            <a href="{{ route('data-spp') }}"
                class="mx-auto flex h-32 w-32 flex-col items-center justify-center rounded-lg bg-blue-800 text-white shadow-lg lg:h-40 lg:w-40">
                <h1 class="mb-2 text-center text-3xl font-bold">SPP</h1>
                <h2 class="mt-2 text-center text-4xl font-black">{{ $totalSpp }}</h2>
            </a>
            <a href="{{ route('data-kelas') }}"
                class="mx-auto flex h-32 w-32 flex-col items-center justify-center rounded-lg bg-green-600 text-white shadow-lg lg:h-40 lg:w-40">
                <h1 class="mb-2 text-center text-3xl font-bold">Kelas</h1>
                <h2 class="mt-2 text-center text-4xl font-black">{{ $totalKelas }}</h2>
            </a>
        </div>

        {{-- show latest history  --}}
        <div class="mb-4 pl-3 text-2xl font-semibold">
            last History :
        </div>
        <div class="w-full overflow-x-auto px-10">
            <table class="table table-striped w-full border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">petugas</th>
                        <th scope="col">NISN</th>
                        <th scope="col">nama siswa</th>
                        <th scope="col">tanggal pembayaran</th>
                        <th scope="col">nominal</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = $pembayarans->firstItem();
                    @endphp
                    @foreach ($pembayarans as $pembayaran)
                        <tr>
                            <td> {{ $i }}</td>
                            <td> {{ $pembayaran->petugas->nama_petugas }}</td>
                            <td> {{ $pembayaran->siswa->nisn }}</td>
                            <td> {{ $pembayaran->siswa->nama }}</td>
                            <td> {{ $pembayaran->tgl_bayar }}</td>
                            <td> {{ $pembayaran->jumlah_bayar }}</td>
                            <td>
                                <button class="h-8 w-14 rounded-lg bg-red-600 text-center text-white">delete</button>
                                <button class="h-8 w-14 rounded-lg bg-yellow-400 text-center text-white">edit</button>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                </tbody>
            </table>
            {{ $pembayarans->links() }}
        </div>
    </div>

</x-layout>

