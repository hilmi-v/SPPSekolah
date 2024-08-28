<x-layout>

    <div class="mb-14 mt-4 flex justify-between">
        <div>
            <h1 class="text-4xl font-bold"> nama </h1>
        </div>
        <div>
            <h1 class="text-xl font-bold"> {{ now()->format('d F o') }} </h1>
        </div>
    </div>
    <div class="mb-5 w-full rounded-lg bg-slate-100 p-3 shadow-md">

        <form action="/pdf" method="GET">
            <p class="mb-5">Buat laporan pembayaran SPP PDF : </p>
            <label for="" class="mb-3">Bulan :</label>
            <select name="bulan" id="" class="inline rounded-lg border-0 shadow-sm ring-0" required>
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
            <div class="my-5">
                <label for="" class="mb-3">Tahun :</label>
                <input type="number" class="rounded-lg border-0 shadow-sm ring-0" name="tahun"
                    placeholder="masukkan tahun" required>
            </div>
            <button class="text-md rounded-lg bg-red-800 px-2 py-2 font-bold text-white" type="submit">Generate
                PDF</button>
        </form>
    </div>
    <p>---atau---</p>
    <div class="mb-5 w-full rounded-lg bg-slate-100 p-3 shadow-md">

        <form action="/excel" method="GET">
            <p class="mb-5">Buat laporan pembayaran SPP Excel : </p>
            <label for="" class="mb-3">Bulan :</label>
            <select name="bulan" id="" class="inline rounded-lg border-0 shadow-sm ring-0" required>
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
            <div class="my-5">
                <label for="" class="mb-3">Tahun :</label>
                <input type="number" class="rounded-lg border-0 shadow-sm ring-0" name="tahun"
                    placeholder="masukkan tahun" required>
            </div>
            <button class="text-md rounded-lg bg-green-800 px-2 py-2 font-bold text-white" type="submit">Generate
                Excel</button>
        </form>
    </div>
</x-layout>

