<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $kelas = Kelas::pluck('id_kelas')->toArray();
        $spp = Spp::pluck('id_spp')->toArray();
        return [
            'nisn' => fake()->unique()->randomNumber(7, true),
            'nis' => fake()->unique()->randomNumber(5, true),
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'no_telp'=> fake()->unique()->phoneNumber(),
            'id_kelas' => fake()->randomElement($kelas),
            'id_spp' =>  fake()->randomElement($spp),
        ];
    }
}
