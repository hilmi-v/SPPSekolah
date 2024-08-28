<x-layout>
    <div class="mb-14 mt-4 flex justify-between">
        <div>
            <h1 class="text-4xl font-bold"> nama </h1>
        </div>
        <div>
            <h1 class="text-xl font-bold"> {{ now()->format('d F o') }} </h1>
        </div>
    </div>

    <div class="mb-5 w-full lg:px-10">
        <p class="text-2xl">Data Siswa :</p>
    </div>
    <div class="mb-5 w-full lg:px-10">
        <button class="text-md rounded-lg bg-green-600 px-2 py-1 font-bold text-white">
            <a href="{{ route('create-siswa') }}">New +</a>
        </button>
    </div>

    <div class="mx-auto w-full">
        <form action="{{ route('data-siswa') }}" class="mx-auto mb-10 w-full text-center" method="GET">
            <input type="search" name="search" id="" placeholder="cari nama siswa, nis, atau NISN"
                class="mr-0 w-[85%] bg-slate-200 py-1 pr-0 placeholder:text-center" value="{{ request('search') }}">
            <input type="submit" value="search" class="ml-0 bg-slate-800 px-2 py-1 text-white">
        </form>
    </div>

    <div class="overflow-x-auto">
        <div class="w-full lg:px-10">
            <table class="table table-striped w-full border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NISN</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">no_tlp</th>
                        <th scope="col">alamat</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = $siswas->firstItem();
                    @endphp

                    @foreach ($siswas as $siswa)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $siswa->nisn }}</td>
                            <td>{{ $siswa->nama }}</td>
                            <td>{{ $siswa->kelas->nama_kelas }}</td>
                            <td>{{ $siswa->no_telp }}</td>
                            <td>{{ Str::limit($siswa->alamat, 20) }}</td>
                            <td>
                                <form action="{{ route('delete-siswa', ['id' => $siswa->nisn]) }}" class="inline"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="h-8 w-14 rounded-lg bg-red-600 text-center text-white" type="submit"
                                        onclick="return confirm('hapus kelas ini {{ $siswa->nama }} | {{ $siswa->kelas->nama_kelas }}')">delete</button>
                                </form>
                                <button class="h-8 w-14 rounded-lg bg-yellow-400 text-center text-white"><a
                                        href="{{ route('edit-siswa', ['id' => $siswa->nisn]) }}">edit</a></button>
                            </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
            {{ $siswas->links() }}
        </div>
    </div>
</x-layout>

