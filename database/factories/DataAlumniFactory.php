<?php

namespace Database\Factories;

use Faker\Provider\id_ID\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataAlumni>
 */
class DataAlumniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            "tahunMasuk" => $this->faker->year($max = 'now'),
            "nim" => "2220" . $this->faker->numberBetween($min = 10000, $max = 99999),
            "name" => $this->faker->name,
            "noIjazahNasional" => $this->faker->numberBetween($min = 1000000000000000, $max = 9999999999999999),
            "nik" => $this->faker->nik,
            "agama" => $this->faker->randomElement([
                "Islam",
                "Kristen",
                "Hindu",
                "Budha",
            ]),
            // "email" => $this->faker->safeEmail,
            "tempatLahir" => $this->faker->city,
            "tanggalLahir" => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            "prodi" => $this->faker->randomElement([
                "DIII Statistika",
                "DIV Statistika",
                "DIV Komputasi Statistik",
            ]),
            "peminatan" => $this->faker->randomElement([
                "Statistik Ekonomi",
                "Statistik Kependudukan",
                "Sistem Informasi",
                "Sains Data",
            ]),
            "kelas" => $this->faker->randomElement([
                "4SK1",
                "4SI1",
                "4SE3",
                "4SD1",
            ]),
            "ipk" => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 2, $max = 4),
            "peringkat" => $this->faker->randomDigit,
            "noHp" => $this->faker->e164PhoneNumber,
            "kabDomisiliPmb" => $this->faker->city,
            "provDomisiliPmb" => $this->faker->state,
            "ijazahasli" => 'ijazahasli/contohijazah.pdf',
            "transkripnilaiasli" => 'transkripnilaiasli/contohtranskrip.pdf',
        ];
    }
}