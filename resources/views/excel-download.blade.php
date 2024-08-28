<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kelas }}</title>
</head>

<body>
    <table>
        <tr>
            <td colspan="6">
                <h2>Daftar Pembayaran Bulan {{ $bulan }} | Tahun
                    {{ $tahun }} </h2>
            </td>
        </tr>
        <tr>
            <td colspan="6">
                <h3>Kelas {{ $kelas }}</h3>
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th bgcolor="black" style="color: white;">#</th>
                <th bgcolor="black" style="color: white;">NISN</th>
                <th bgcolor="black" style="color: white;">Nama</th>
                <th bgcolor="black" style="color: white;">tgl_bayar</th>
                <th bgcolor="black" style="color: white;">Nominal</th>
                <th bgcolor="black" style="color: white;">keterangan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
                $lunas = 0;
                $kurang = 0;
                $kosong = 0;
                $total = 0;
            @endphp
            @foreach ($pembayarans as $payment)
                @if ($payment->jumlah_bayar == $payment->spp->nominal)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $payment->nisn }}</td>
                        <td>{{ $payment->siswa->nama }}</td>
                        <td>{{ date('d F o', strtotime($payment->tgl_bayar)) }}</td>
                        <td>{{ $payment->jumlah_bayar }}</td>
                        <td style="color: white; background-color: #198754; font-weight: bold;">Lunas</td>
                    </tr>
                    @php
                        $lunas++;
                        $total += $payment->jumlah_bayar;
                    @endphp
                @else
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $payment->nisn }}</td>
                        <td>{{ $payment->siswa->nama }}</td>
                        <td>{{ date('d F o', strtotime($payment->tgl_bayar)) }}</td>
                        <td>{{ $payment->jumlah_bayar }}</td>
                        <td style="color: white; background-color: #ffc107; font-weight: bold;">
                            {{ $payment->jumlah_bayar - $payment->spp->nominal }}</td>
                        @php
                            $kurang++;
                            $total += $payment->jumlah_bayar;
                        @endphp
                    </tr>
                @endif
            @endforeach

            @if ($belums)
                @foreach ($belums as $belum)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $belum->nisn }}</td>
                        <td>{{ $belum->nama }}</td>
                        <td>-</td>
                        <td>-</td>
                        <td style="color: white; background-color: #dc3545; font-weight: bold;">Belum membayar</td>
                    </tr>
                    @php
                        $kosong++;
                    @endphp
                @endforeach
            @endif
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="3">
                    <h4>Keterangan:</h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">Total siswa :</td>
                <td>{{ $lunas + $kurang + $kosong }} </td>
            </tr>
            <tr>
                <td colspan="2">Siswa Lunas :</td>
                <td>{{ $lunas }}</td>
            </tr>
            <tr>
                <td colspan="2">Siswa kurang :</td>
                <td>{{ $kurang }}</td>
            </tr>
            <tr>
                <td colspan="2">Siswa belum membayar:</td>
                <td>{{ $kosong }}</td>
            </tr>
            <tr>
                <td colspan="2">Total uang SPP:</td>
                <td>{{ $total }}</td>
            </tr>
        </tbody>
    </table>

</body>

</html>

