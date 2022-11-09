<?php

namespace Database\Seeders;

use App\Models\dataalumni;
use App\Models\Permohonan;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
            'name' => 'Setia Pramana',
            'email' => 'wadir1@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',
        ]);
        $wadir1->assignRole('wadir1');

        $kepalabaak = User::create([
            'name' => 'Dwy Bagus Cahyono',
            'email' => 'kepalabaak@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',

        ]);
        $kepalabaak->assignRole('kepalabaak');

        $petugasbaak = User::create([
            'name' => 'Kepala BAAK',
            'email' => 'petugasbaak@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',

        ]);
        $petugasbaak->assignRole('petugasbaak');

        $alumni1 = User::create([
            'name' => 'M Zikri',
            'email' => 'alumni1@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',
            'nim' => '222011623',
            'nip' => '2019439294920230',
            'nomorPonsel' => '085376470953',
            'tanggalLahir' => '2022-11-08',
            'jurusan' => 'D-IV Komputasi Statistik',
            'tahunLulus' => '2014',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',

        ]);
        $alumni1->assignRole('alumni');

        $data1 = dataalumni::create([
            'name' => 'M Zikri',
            'nim' => '222011623',
            'tanggalLahir' => '2022-11-08',
            'tahunLulus' => '2014',
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);

        $alumni2 = User::create([
            'name' => 'M Hanief',
            'email' => 'alumni2@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Pending',
            // 'nim' => '222011686',
            'nip' => '2019439294920230',
            'nomorPonsel' => '085376470953',
            'tanggalLahir' => '2022-10-08',
            'jurusan' => 'D-IV Komputasi Statistik',
            // 'tahunLulus' => '2015',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',
        ]);
        $alumni2->assignRole('alumni');

        $data1 = dataalumni::create([
            'name' => 'M Hanief',
            'nim' => '222011787',
            'tanggalLahir' => '2022-10-08',
            'tahunLulus' => '2014',
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);

        $alumni3 = User::create([
            'name' => 'M Zaki',
            'email' => 'alumni3@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Pending',
            // 'nim' => '222011686',
            'nip' => '2019439294920230',
            'nomorPonsel' => '085376470953',
            'tanggalLahir' => '2022-11-08',
            'jurusan' => 'D-IV Komputasi Statistik',
            // 'tahunLulus' => '2015',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',
        ]);
        $alumni3->assignRole('alumni');


        $data1 = dataalumni::create([
            'name' => 'M Zaki',
            'nim' => '222011232',
            'tanggalLahir' => '2022-11-08',
            'tahunLulus' => '2014',
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);


        // Buat seed untuk manajemen data alumni (add ijazah asli dan transkrip nilai)
        $data1 = dataalumni::create([
            'name' => 'Marsha Kamal',
            'nim' => '222011341',
            'tanggalLahir' => '2022-11-13',
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);


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

        $permohonan1 = Permohonan::create([
            'user_id' => '5',
            'jenis' => 'transkrip',
            'file_kampusln' => 'permohonan/KoRWMsRkdwPc9ayFY3GRzlwie9ndksvmxKHUamt3.pdf',
            'file_permohonan' => 'permohonan/vESrFoZwpRHo5P4rh7Yhhr2wUEB2FZARIJ0GRiSP.pdf',
            'pengambilan' => '2',
            'status' => 'Selesai',
        ]);
    }
}