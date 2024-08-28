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
        <p class="text-2xl">Data Kelas :</p>
    </div>
    <div class="mb-5 w-full lg:px-10">
        <button class="text-md rounded-lg bg-green-600 px-2 py-1 font-bold text-white"><a
                href="{{ route('create-kelas') }}">New +</a></button>
    </div>

    <div class="overflow-x-auto">
        <div class="w-full lg:px-10">
            <table class="table table-striped w-full border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nama kelas</th>
                        <th scope="col">kompetensi keahlian</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                @php
                    $i = $kelass->firstItem();
                @endphp
                @foreach ($kelass as $kelas)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $kelas->nama_kelas }}</td>
                        <td>{{ $kelas->kompetensi_keahlian }}</td>
                        <td>
                            <form action="{{ route('delete-kelas', ['id' => $kelas->id_kelas]) }}" class="inline"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="h-8 w-14 rounded-lg bg-red-600 text-center text-white" type="submit"
                                    onclick="return confirm('hapus kelas ini {{ $kelas->nama_kelas }} | {{ $kelas->kompetensi_keahlian }}')">delete</button>
                            </form>
                            <button class="h-8 w-14 rounded-lg bg-yellow-400 text-center text-white"><a
                                    href="{{ route('edit-kelas', ['kelas' => $kelas->id_kelas]) }}">edit</a></button>
                        </td>
                        @php
                            $i++;
                        @endphp
                    </tr>
                @endforeach

                </tbody>
            </table>
            {{ $kelass->links() }}
        </div>
    </div>

</x-layout>

