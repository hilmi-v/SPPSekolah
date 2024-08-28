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
        <p class="text-2xl">Data Petugas :</p>
    </div>
    <div class="mb-5 w-full lg:px-10">
        <button class="text-md rounded-lg bg-green-600 px-2 py-1 font-bold text-white"><a
                href="{{ route('create-petugas') }}">New +</a></button>
    </div>

    <div class="overflow-x-auto">
        <div class="w-full lg:px-10">
            <table class="table table-striped w-full border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Level</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = $petugass->firstItem();
                    @endphp

                    @foreach ($petugass as $petugas)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $petugas->username }}</td>
                            <td>{{ $petugas->nama_petugas }}</td>
                            <td>{{ $petugas->level }}</td>
                            <td>
                                <form action="{{ route('delete-petugas', ['id' => $petugas->id_petugas]) }}"
                                    class="inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="h-8 w-14 rounded-lg bg-red-600 text-center text-white" type="submit"
                                        onclick="return confirm('hapus kelas ini {{ $petugas->username }} | {{ $petugas->nama_petugas }}')">delete</button>
                                </form>
                                <button class="h-8 w-14 rounded-lg bg-yellow-400 text-center text-white"><a
                                        href="{{ route('edit-petugas', ['id' => $petugas->id_petugas]) }}">edit</a></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $petugass->links() }}
        </div>
    </div>

</x-layout>

