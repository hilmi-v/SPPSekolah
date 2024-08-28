<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Spp::create([
            'tahun' => 2024,
            'nominal' => 150000,
        ]);

        Kelas::create([
            'nama_kelas' => '11 PPLG',
            'kompetensi_keahlian' => 'pengembangan perangkat lunak dan gim',
        ]);
        Kelas::create([
            'nama_kelas' => '11 DKV',
            'kompetensi_keahlian' => 'desain kreatif visual',
        ]);

        Petugas::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'nama_petugas' => 'admin',
            'level' => 'admin',
        ]);
        Petugas::create([
            'username' => 'petugas',
            'password' => bcrypt('petugas'),
            'nama_petugas' => 'petugas',
            'level' => 'petugas',
        ]);

        Siswa::factory(5)->create();

        Pembayaran::factory(20)->create();
    }
}
