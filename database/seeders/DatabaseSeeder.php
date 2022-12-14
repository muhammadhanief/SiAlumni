<?php

namespace Database\Seeders;

use App\Models\dataalumni;
use App\Models\Permohonan;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Provider\id_ID\Person;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Buat role
        Role::create(['name' => 'superadmin']);
        Role::create(['name' => 'wadir1']);
        Role::create(['name' => 'kepalabaak']);
        Role::create(['name' => 'petugasbaak']);
        Role::create(['name' => 'alumni']);

        // Buat akun dummy untuk superadmin, baak, dan wadir dan alumni
        $superadmin = User::create([
            'name' => 'Muhammad Hanief',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',
        ]);
        $superadmin->assignRole('superadmin');

        $wadir1 = User::create([
            'name' => 'Prof. Setia Pramana, Ph.D.',
            'email' => 'wadir1stis@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',
        ]);
        $wadir1->assignRole('wadir1');

        $kepalabaak = User::create([
            'name' => 'Nurseto Wisnumurti, S.Si., M.Stat',
            'email' => 'kepalabaakstis@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',

        ]);
        $kepalabaak->assignRole('kepalabaak');

        $petugasbaak = User::create([
            'name' => 'Petugas BAAK',
            'email' => 'petugasbaak@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',

        ]);
        $petugasbaak->assignRole('petugasbaak');

        $alumni1 = User::create([
            'name' => 'SiAlumni 1',
            'email' => 'sialumni1bps@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',
            'nim' => '222011623',
            'nip' => '198708262010121001',
            'tipe_alumni' => 'BPS',
            'nomorPonsel' => '085376470953',
            "tempatLahir" => "DKI Jakarta",
            'tanggalLahir' => '2000-11-08',
            'jurusan' => 'D-IV Komputasi Statistik',
            'tahunLulus' => '2014',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',

        ]);
        $alumni1->assignRole('alumni');

        $data1 = dataalumni::create([
            "tahunMasuk" => "2019",
            'nim' => '222011623',
            'name' => 'SiAlumni 1',
            "noIjazahNasional" => "1000000000000000",
            "nik" => "1304032508010003",
            "agama" => "Islam",
            // "email" => $this->faker->safeEmail,
            "tempatLahir" => "Indonesia",
            'tanggalLahir' => '2000-11-08',
            "prodi" => "DIV Komputasi Statistik",
            "peminatan" => "Sistem Informasi",
            "kelas" => "4SI1",
            "status" => "Tugas Belajar",
            "ipk" => "4,00",
            "peringkat" => "3",
            "noHp" => "085376470953",
            "kabDomisiliPmb" => "Jakarta",
            "provDomisiliPmb" => "DKI Jakarta",
            "provDaftarPmb" => "Papua",
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);

        $alumni2 = User::create([
            'name' => 'SiAlumni 2',
            'email' => 'sialumni2nonbps@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',
            'nim' => '222011787',
            'instansi' => 'PT. Tokopedia',
            'tipe_alumni' => 'Non-BPS',
            'nomorPonsel' => '085376470953',
            "tempatLahir" => "Padang",
            'tanggalLahir' => '2000-12-08',
            'jurusan' => 'D-IV Statistika',
            'tahunLulus' => '2014',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',
        ]);
        $alumni2->assignRole('alumni');

        $data1 = dataalumni::create([
            "tahunMasuk" => "2019",
            'nim' => '222011787',
            'name' => 'SiAlumni 2',
            "noIjazahNasional" => "1000000000000000",
            "nik" => "1304032508010003",
            "agama" => "Islam",
            // "email" => $this->faker->safeEmail,
            "tempatLahir" => "Padang",
            'tanggalLahir' => '2000-12-08',
            "prodi" => "DIV Statistika",
            "peminatan" => "Statistik Kependudukan",
            "kelas" => "4SK1",
            "status" => "Tugas Belajar",
            "ipk" => "4,00",
            "peringkat" => "2",
            "noHp" => "085376470953",
            "kabDomisiliPmb" => "Jakarta",
            "provDomisiliPmb" => "DKI Jakarta",
            "provDaftarPmb" => "Papua",
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);

        $alumni3 = User::create([
            'name' => 'M Zaki Ramadhani',
            'email' => 'zakiramadhanii88@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Pending',
            'nim' => '222011351',
            'nip' => '198708262020121001',
            'tipe_alumni' => 'BPS',
            'nomorPonsel' => '085376470953',
            "tempatLahir" => "Banjarmasin",
            'tanggalLahir' => '2000-11-14',
            'jurusan' => 'D-IV Komputasi Statistik',
            'tahunLulus' => '2019',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',
        ]);
        $alumni3->assignRole('alumni');


        $data1 = dataalumni::create([
            "tahunMasuk" => "2019",
            'nim' => '222011351',
            'name' => 'M Zaki Ramadhani',
            "noIjazahNasional" => "1000000000000000",
            "nik" => "1304032508010003",
            "agama" => "Islam",
            // "email" => $this->faker->safeEmail,
            "tempatLahir" => "Banjarmasin",
            'tanggalLahir' => '2000-12-14',
            "prodi" => "DIV Komputasi Statistik",
            "peminatan" => "Sistem Informasi",
            "kelas" => "4SI1",
            "status" => "Tugas Belajar",
            "ipk" => "4,00",
            "peringkat" => "1",
            "noHp" => "085376470953",
            "kabDomisiliPmb" => "Jakarta",
            "provDomisiliPmb" => "DKI Jakarta",
            "provDaftarPmb" => "Banjarmasin",
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);


        // Buat seed untuk manajemen data alumni (add ijazah asli dan transkrip nilai)
        // $data1 = dataalumni::create([
        //     'name' => 'Marsha Kamal',
        //     'nim' => '222011341',
        //     'tanggalLahir' => '2022-11-13',
        //     'ijazahasli' => 'ijazahasli/contohijazah.pdf',
        //     'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        // ]);


        // Seed untuk permohonan
        $permohonan1 = Permohonan::create([
            'user_id' => '5',
            'jenis' => 'ijazah',
            'file_kampusln' => 'permohonan/KoRWMsRkdwPc9ayFY3GRzlwie9ndksvmxKHUamt3.pdf',
            'file_permohonan' => 'permohonan/vESrFoZwpRHo5P4rh7Yhhr2wUEB2FZARIJ0GRiSP.pdf',
            'pengambilan' => '2',
            'status' => 'Menunggu',
        ]);

        $permohonan1 = Permohonan::create([
            'user_id' => '5',
            'jenis' => 'ijazah',
            'file_kampusln' => 'permohonan/KoRWMsRkdwPc9ayFY3GRzlwie9ndksvmxKHUamt3.pdf',
            'file_permohonan' => 'permohonan/vESrFoZwpRHo5P4rh7Yhhr2wUEB2FZARIJ0GRiSP.pdf',
            'pengambilan' => '2',
            'status' => 'Disetujui Petugas BAAK',
        ]);

        $permohonan1 = Permohonan::create([
            'user_id' => '5',
            'jenis' => 'ijazah',
            'file_kampusln' => 'permohonan/KoRWMsRkdwPc9ayFY3GRzlwie9ndksvmxKHUamt3.pdf',
            'file_permohonan' => 'permohonan/vESrFoZwpRHo5P4rh7Yhhr2wUEB2FZARIJ0GRiSP.pdf',
            'pengambilan' => '2',
            'status' => 'Disetujui Petugas BAAK',
        ]);

        $permohonan1 = Permohonan::create([
            'user_id' => '5',
            'jenis' => 'transkrip',
            'file_kampusln' => 'permohonan/KoRWMsRkdwPc9ayFY3GRzlwie9ndksvmxKHUamt3.pdf',
            'file_permohonan' => 'permohonan/vESrFoZwpRHo5P4rh7Yhhr2wUEB2FZARIJ0GRiSP.pdf',
            'pengambilan' => '2',
            'status' => 'Disetujui Kepala BAAK',
        ]);

        $permohonan1 = Permohonan::create([
            'user_id' => '5',
            'jenis' => 'ijazah',
            'file_kampusln' => 'permohonan/KoRWMsRkdwPc9ayFY3GRzlwie9ndksvmxKHUamt3.pdf',
            'file_permohonan' => 'permohonan/vESrFoZwpRHo5P4rh7Yhhr2wUEB2FZARIJ0GRiSP.pdf',
            'pengambilan' => '2',
            'status' => 'Disetujui Wakil Direktur 1',
        ]);

        // $permohonan1 = Permohonan::create([
        //     'user_id' => '5',
        //     'jenis' => 'transkrip',
        //     'file_kampusln' => 'permohonan/KoRWMsRkdwPc9ayFY3GRzlwie9ndksvmxKHUamt3.pdf',
        //     'file_permohonan' => 'permohonan/vESrFoZwpRHo5P4rh7Yhhr2wUEB2FZARIJ0GRiSP.pdf',
        //     'pengambilan' => '2',
        //     'status' => 'Selesai',
        // ]);

        \App\Models\dataalumni::factory(40)->create();

        $data1 = dataalumni::create([
            "tahunMasuk" => "2010",
            'nim' => '222011686',
            'name' => 'Muhammad Hanief',
            "noIjazahNasional" => "1000000000000000",
            "nik" => "1304032508010003",
            "agama" => "Islam",
            // "email" => $this->faker->safeEmail,
            "tempatLahir" => "Padang",
            'tanggalLahir' => '2001-08-25',
            "prodi" => "DIV Komputasi Statistik",
            "peminatan" => "Sistem Informasi",
            "kelas" => "3SI1",
            "status" => "Ikatan Dinas",
            "ipk" => "4,00",
            "peringkat" => "1",
            "noHp" => "085376470953",
            "kabDomisiliPmb" => "Tanah Datar",
            "provDomisiliPmb" => "Sumatera Barat",
            "provDaftarPmb" => "Sumatera Barat",
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);
    }
}