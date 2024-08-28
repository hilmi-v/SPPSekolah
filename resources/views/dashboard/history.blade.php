<x-layout>
    <div class="mb-24 mt-4 flex justify-between px-8">
        <div>
            <h1 class="text-4xl font-bold"> nama </h1>
        </div>
        <div>
            <h1 class="text-xl font-bold"> {{ now()->format('d F o') }} </h1>
        </div>
    </div>
    <div class="mx-auto w-full">

        <form action="{{ route('history') }}" class="mb-10 w-full text-center" method="GET">
            <input type="search" name="search" id="" placeholder="cari nama petugas, siswa, atau NISN"
                class="mr-0 w-[85%] bg-slate-200 py-1 pr-0 placeholder:text-center"
                value="{{ Request::get('search') }}">
            <input type="submit" value="search" class="ml-0 bg-slate-800 px-2 py-1 text-white">
        </form>
        <div class="w-full px-10">
            <table class="table table-striped w-full overflow-y-scroll border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">petugas</th>
                        <th scope="col">NISN</th>
                        <th scope="col">nama siswa</th>
                        <th scope="col">bulan</th>
                        <th scope="col">tanggal pembayaran</th>
                        <th scope="col">nominal</th>
                        <th scope="col">keterangan</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pembayarans->count() == 0)
                        <tr>
                            <td colspan="10">
                                <h1 class="text-center text-2xl text-slate-700"> Data Tidak Ada</h1>
                            </td>
                        </tr>
                    @else
                        @php
                            $i = $pembayarans->firstItem();
                        @endphp
                        @foreach ($pembayarans as $pembayaran)
                            <tr>
                                <td> {{ $i }}</td>
                                <td> {{ $pembayaran->petugas->nama_petugas }}</td>
                                <td> {{ $pembayaran->siswa->nisn }}</td>
                                <td> {{ $pembayaran->siswa->nama }}</td>
                                <td> {{ $pembayaran->bulan_dibayar }} | {{ $pembayaran->tahun_dibayar }} </td>
                                <td> {{ $pembayaran->tgl_bayar }}</td>
                                <td> Rp. {{ Number::format($pembayaran->jumlah_bayar, locale: 'id') }}</td>
                                <td>
                                    @if ($pembayaran->spp->nominal - $pembayaran->jumlah_bayar <= 0)
                                        Lunas
                                    @else
                                        kurang
                                        {{ Number::format($pembayaran->spp->nominal - $pembayaran->jumlah_bayar, locale: 'id') }}
                                    @endif
                                </td>
                                <td>
                                    <form
                                        action="{{ route('delete-pembayaran', ['id' => $pembayaran->id_pembayaran]) }}"
                                        class="inline" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="h-8 w-14 rounded-lg bg-red-600 text-center text-white"
                                            type="submit"
                                            onclick="return confirm('hapus transaksi ini {{ $pembayaran->siswa->nama }} | {{ $pembayaran->bulan_dibayar }}')">delete</button>
                                    </form>
                                    <button class="h-8 w-14 rounded-lg bg-yellow-400 text-center text-white"><a
                                            href="{{ route('edit-pembayaran', ['id' => $pembayaran->id_pembayaran]) }}">edit</a></button>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    @endif

                </tbody>
            </table>
            {{ $pembayarans->links() }}
        </div>
    </div>
</x-layout>

