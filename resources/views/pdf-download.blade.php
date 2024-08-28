<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mx-auto">
        <div class="mb-5">
            <h2 class="bold title text-center">Daftar Pembayaran Bulan {{ $bulan }} | Tahun
                {{ $tahun }} </h2>
            <h4 class="bold text-center">Dibuat Pada : {{ now()->format('d F o') }} </h4>
        </div>
        @php
            $lunas = 0;
            $kurang = 0;
            $kosong = 0;
            $total = 0;
            $i = 1;
        @endphp

        @foreach ($kelasList as $kelas)
            <div>
                <h3 class="fw-semibold text-center">Kelas {{ $kelas }}</h3>

            </div>
            <table>
                <thead class="text-white">
                    <tr class="bg-hitam bold text-center">
                        <th class="text-putih px-4 py-2 text-center">#</th>
                        <th class="text-putih px-4 py-2 text-center">NISN</th>
                        <th class="text-putih px-4 py-2 text-center">Nama</th>
                        <th class="text-putih px-4 py-2 text-center">tgl_bayar</th>
                        <th class="text-putih px-4 py-2 text-center">Nominal</th>
                        <th class="text-putih px-4 py-2 text-center">keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($pembayarans->has($kelas))
                        @foreach ($pembayarans[$kelas] as $payments)
                            @if ($payment->jumlah_bayar == $payment->spp->nominal)
                                <tr class="text-center">
                                    <td class="px-4 py-2 text-center">{{ $i++ }}</td>
                                    <td class="px-4 py-2 text-center">{{ $payment->nisn }}</td>
                                    <td class="px-4 py-2 text-center">{{ $payment->siswa->nama }}</td>
                                    <td class="px-4 py-2 text-center">
                                        {{ date('d F o', strtotime($payment->tgl_bayar)) }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        {{ Number::currency($payment->jumlah_bayar, in: 'IDR', locale: 'id') }}</td>
                                    <td class="bg-hijau text-putih bold text-center">Lunas</td>
                                </tr>
                                @php
                                    $lunas++;
                                    $total += $payment->jumlah_bayar;
                                @endphp
                            @else
                                <tr class="text-center">
                                    <td class="px-4 py-2 text-center">{{ $i++ }}</td>
                                    <td class="px-4 py-2 text-center">{{ $payment->nisn }}</td>
                                    <td class="px-4 py-2 text-center">{{ $payment->siswa->nama }}</td>
                                    <td class="px-4 py-2 text-center">
                                        {{ date('d F o', strtotime($payment->tgl_bayar)) }}
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        {{ Number::currency($payment->jumlah_bayar, in: 'IDR') }}</td>
                                    <td class="bg-kuning text-putih bold text-center">
                                        {{ Number::currency($payment->jumlah_bayar - $payment->spp->nominal, in: 'IDR', locale: 'id') }}
                                    </td>
                                    @php
                                        $kurang++;
                                        $total += $payment->jumlah_bayar;
                                    @endphp
                                </tr>
                            @endif
                        @endforeach
                    @endif

                    @if ($belums->has($kelas))
                        @foreach ($belums[$kelas] as $belum)
                            <tr class="text-center">
                                <td class="px-4 py-2 text-center">{{ $i++ }}</td>
                                <td class="px-4 py-2 text-center">{{ $belum->nisn }}</td>
                                <td class="px-4 py-2 text-center">{{ $belum->nama }}</td>
                                <td class="px-4 py-2 text-center"> - </td>
                                <td class="px-4 py-2 text-center"> - </td>
                                <td class="bold bg-merah text-putih text-center">
                                    Belum membayar
                                </td>
                            </tr>
                            @php
                                $kosong++;
                            @endphp
                        @endforeach
                    @endif
                </tbody>
            </table>

            <pagebreak>
        @endforeach

        <div>
            <table class="table">
                <thead>
                    <tr class="bg-hitam bold">
                        <th colspan="2">
                            <p class="text-putih text-center">Keterangan</p>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total siswa</td>
                        <td>: {{ $jumlahSiswa }}</td>
                    </tr>
                    <tr>
                        <td>Siswa Lunas</td>
                        <td>: {{ $lunas }}</td>
                    </tr>
                    <tr>
                        <td>Siswa kurang</td>
                        <td>: {{ $kurang }}</td>
                    </tr>
                    <tr>
                        <td>siswa belum membayar</td>
                        <td>: {{ $kosong }}</td>
                    </tr>
                    <tr>
                        <td>Total uang Spp</td>
                        <td>: {{ Number::currency($total, in: 'IDR', locale: 'id') }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

<style>
    .container {
        padding: 0px 20px 0px 20px;
    }

    table,
    td,
    th {
        border: 1px solid #dddddd;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }

    .bg-hitam {
        background-color: black;
        font-weight: bold;
    }

    .bg-hijau {
        background-color: #198754;
        font-weight: bold;
    }

    .bg-kuning {
        background-color: #ffc107;
        font-weight: bold;
    }

    .bg-merah {
        background-color: #dc3545;
        font-weight: bold;
    }

    .text-putih {
        color: white;
    }

    .bold {
        font-weight: bold;
    }

    .title {
        font-size: 20px
    }
</style>

