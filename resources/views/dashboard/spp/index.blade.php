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
        <p class="text-2xl">Data SPP :</p>
    </div>
    <div class="mb-5 w-full lg:px-10">
        <button class="text-md rounded-lg bg-green-600 px-2 py-1 font-bold text-white"><a
                href="{{ route('create-spp') }}">New +</a></button>
    </div>

    <div class="overflow-x-auto">
        <div class="w-full lg:px-10">
            <table class="table table-striped w-full border">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Nominal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = $spps->firstItem(); // Inisialisasi item pertama di halaman saat ini
                    @endphp
                    @foreach ($spps as $spp)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $spp->tahun }}</td>
                            <td>{{ $spp->nominal }}</td>
                            <td>
                                <form action="{{ route('delete-spp', ['id' => $spp->id_spp]) }}" class="inline"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="h-8 w-14 rounded-lg bg-red-600 text-center text-white" type="submit"
                                        onclick="return confirm('hapus kelas ini {{ $spp->tahun }} | {{ $spp->nominal }}')">delete</button>
                                </form>
                                <button class="h-8 w-14 rounded-lg bg-yellow-400 text-center text-white"><a
                                        href="{{ route('edit-spp', ['id' => $spp->id_spp]) }}">edit</a></button>
                            </td>
                        </tr>
                        @php $i++ @endphp
                    @endforeach
                </tbody>
            </table>
            {{ $spps->links() }}
        </div>
    </div>

</x-layout>

