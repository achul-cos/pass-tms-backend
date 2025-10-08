<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use App\Models\Jadwal;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tiket>
 */
class TiketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = \Faker\Factory::create('id_ID');

        $jenisKendaraan = $faker->randomElement(['mobil', 'motor']);

        if ($jenisKendaraan === 'motor') {
            $jumlahPenumpang = $faker->numberBetween(1, 2);             // Kalau motor, jumlah penumpang 1–2
        } else {
            $jumlahPenumpang = $faker->numberBetween(1, 6);            // Kalau mobil, jumlah penumpang 1–6
        }        

        return [
            'penumpang_id' => Customer::factory(),
            'jadwal_id' => Jadwal::factory(),
            'nomor_kendaraan' => $faker->regexify('[A-Z]{1,2} [0-9]{3,4} [A-Z]{1,3}'),
            'jenis_kendaraan' => $jenisKendaraan,
            'penumpang_list'  => json_encode(collect(range(1, $jumlahPenumpang))->map(fn() => $faker->name())->toArray()),
            'status' => $faker->randomElement(['menunggu_verifikasi', 'terverifikasi', 'dibatalkan']),
            'jumlah_penumpang' => $jumlahPenumpang,
        ];
    }
}
