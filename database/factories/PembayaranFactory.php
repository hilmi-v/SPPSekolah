<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $siswa = Siswa::pluck('nisn')->toArray();

        return [
            'id_petugas' => 1,
            'nisn' => fake()->randomElement($siswa),
            'id_spp' => 1,
            'tgl_bayar' => now(),
            'bulan_dibayar' => fake()->monthName(),
            'tahun_dibayar' => fake()->year(),
            'jumlah_bayar' => 150000
        ];
    }
}
