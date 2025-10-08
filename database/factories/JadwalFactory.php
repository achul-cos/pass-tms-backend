<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jadwal>
 */
class JadwalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $faker = \Faker\Factory::create('id_ID');

        // Daftar Nama Kapal
        $kapal = $faker->randomElement([
            'KMP Senangin',
            'KMP Sembilang',
            'KMP Satria Pratama',
            'KMP Citra Mandala Abadi',
            'KMP Tanjung Burang',
            'KMP Niaga Fery II'
        ]);

        // Daftar Lokasi Tujuan
        $daftarTujuan = [
            "Dabo Singkep",
            "Kuala Tungkal",
            "Tanjung Balai Karimun",
            "Bintan",
            "Sei Selari Pakning",
            "Tanjung Uban",
        ];

        // Fungsi Faker untuk mengacak tempat tujuan
        $tujuan = $faker->randomElements($daftarTujuan);

        // Daftar durasi perjalanan berdasarkan rute (dalam jam)
        $durasiPerjalanan = [
            "Dabo Singkep" => [6, 9],
            "Kuala Tungkal" => [8, 12],
            "Tanjung Balai Karimun" => [8, 10],
            "Bintan" => [2, 4],
            "Sei Selari Pakning" => [10, 14],
            "Tanjung Uban" => [3, 7],            
        ];

        // Menetukan Waktu Berangkat
        $waktuBerangkat = Carbon::tomorrow()
            ->addHours($faker->numberBetween(6, 20)) // Antara jam 06:00 – 20:00
            ->addMinutes($faker->numberBetween(0, 59));

        // Hitung waktu tiba berdasarkan durasi sesuai tujuan
        $durasiJam = $faker->numberBetween(
            $durasiPerjalanan[$tujuan][0],
            $durasiPerjalanan[$tujuan][1]
        );
        $waktuTiba = (clone $waktuBerangkat)->addHours($durasiJam);        

        //Daftar Harga tiket berdasarkan rute (dalam IDR)
        $hargaPerjalanan = [
            "Dabo Singkep" => [120000, 180000],       // harga random 120k–180k
            "Kuala Tungkal" => [200000, 300000],      // harga random 200k–300k
            "Tanjung Balai Karimun" => [100000, 150000],
            "Bintan" => [50000, 80000],
            "Sei Selari Pakning" => [220000, 280000],
            "Tanjung Uban" => [60000, 100000],            
        ];

        // ambil harga random sesuai tujuan
        $harga = $faker->numberBetween($hargaPerjalanan[$tujuan][0], $hargaPerjalanan[$tujuan][1]);        

        return [
            'nama_jadwal' => "Pelabuhan Telaga Punggur (Kota Batam) - {$tujuan}",
            'waktu_berangkat' => $waktuBerangkat,
            'waktu_tiba' => $waktuTiba,
            'lokasi_berangkat' => "Pelabuhan Telaga Punggur",
            'lokasi_tiba' => $tujuan,
            'harga' => $harga,
            'kapasitas' => $faker->numberBetween(25, 50) * 2,
            'nama_kapal' => $kapal,
        ];
    }
}
