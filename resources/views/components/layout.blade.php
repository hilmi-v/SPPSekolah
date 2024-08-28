<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SPP</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="font-inter h-full w-full">

    <x-navbar></x-navbar>

    <main {{ $attributes }}>
        <div class="flex" x-data = "{ open : false}">
            <div :class="{ 'min-w-40': open, 'min-w-10': !open }"
                class="fixed float-left mr-3 h-svh bg-slate-700 pt-8 text-white transition-all duration-300 md:min-w-48">
                <div class="mt-10 flex items-center pb-3 pl-1 pt-1" :class="{ 'justify-center': open }">
                    <button name="hamburger" type="button" class="block px-1 md:hidden" @click="open = !open">
                        <span class="hamburger-line origin-top-left transition-all duration-300"
                            :class="{ 'rotate-45': open }"></span>
                        <span class="hamburger-line transition-all duration-300" :class="{ 'opacity-0': open }"></span>
                        <span class="hamburger-line origin-bottom-left transition-all duration-300"
                            :class="{ '-rotate-45': open }"></span>
                    </button>
                </div>
                <div>
                    <div class="relative flex justify-center px-2 py-3 lg:pl-3" x-data = "{profile : false}">
                        <button class="p1 h-5 w-5 rounded-full bg-slate-100 lg:h-12 lg:w-12"
                            @click="profile = !profile, open = true "></button>
                        <div class="absolute top-16 rounded bg-slate-100 p-3 text-black shadow-lg"
                            :class="{ 'hidden': !profile }">
                            <p class="text-center text-sm">{{ Auth::guard('petugas')->user()->nama_petugas }}</p>
                            <p class="mb-2 text-center text-xs">123123123</p>
                            <button
                                class="mx-auto flex items-center rounded-lg bg-red-600 p-1 text-white hover:bg-red-500">
                                <a href="{{ route('logout') }}" class="text-sm">
                                    < logout</a>
                            </button>

                        </div>
                    </div>
                    <x-dashboard-menu href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')"> Dashboard</x-dashboard-menu>
                    <x-dashboard-menu href="{{ route('history') }}" :active="request()->routeIs('history')">history</x-dashboard-menu>
                    <x-dashboard-menu href="{{ route('pembayaran') }}" :active="request()->routeIs('pembayaran')">pembayaran</x-dashboard-menu>
                    <x-dashboard-menu href="{{ route('data-siswa') }}" :active="request()->routeIs(['data-siswa', 'create-siswa'])"> data siswa</x-dashboard-menu>
                    <x-dashboard-menu href="{{ route('data-petugas') }}" :active="request()->routeIs(['data-petugas', 'create-petugas'])"> data
                        petugas</x-dashboard-menu>
                    <x-dashboard-menu href="{{ route('data-spp') }}" :active="request()->routeIs(['data-spp', 'create-spp'])">data spp

                    </x-dashboard-menu>
                    <x-dashboard-menu href="{{ route('data-kelas') }}" :active="request()->routeIs(['data-kelas', 'create-kelas'])">data kelas</x-dashboard-menu>
                    <x-dashboard-menu href="{{ route('laporan') }}" :active="request()->routeIs('laporan')">laporan</x-dashboard-menu>
                </div>
            </div>
            <div class="container ml-3 mt-14 w-full md:ml-48">

                {{ $slot }}
            </div>
        </div>
    </main>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>

