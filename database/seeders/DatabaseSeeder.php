<?php

namespace Database\Seeders;

use App\Models\dataalumni;
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
        Role::create(['name' => 'baak']);
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

        $baak = User::create([
            'name' => 'Dwy Bagus Cahyono',
            'email' => 'baak@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',

        ]);
        $baak->assignRole('baak');

        $alumni1 = User::create([
            'name' => 'M Zikri',
            'email' => 'alumni1@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Lolos',
            'nim' => '222011686',
            'nip' => '2019439294920230',
            'nomorPonsel' => '085376470953',
            'statusAkun' => 'Lolos',
            'tanggalLahir' => '2022-11-08',
            'jurusan' => 'D-IV Komputasi Statistik',
            'tahunLulus' => '2015',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',

        ]);
        $alumni1->assignRole('alumni');

        $alumni2 = User::create([
            'name' => 'M Hanief',
            'email' => 'alumni2@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Pending',
            'nim' => '222011686',
            'nip' => '2019439294920230',
            'nomorPonsel' => '085376470953',
            'statusAkun' => 'Lolos',
            'tanggalLahir' => '2022-11-08',
            'jurusan' => 'D-IV Komputasi Statistik',
            'tahunLulus' => '2015',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',
        ]);
        $alumni2->assignRole('alumni');

        $alumni3 = User::create([
            'name' => 'M Zaki',
            'email' => 'alumni3@gmail.com',
            'password' => Hash::make('password'),
            'statusAkun' => 'Ditolak',
            'nim' => '222011686',
            'nip' => '2019439294920230',
            'nomorPonsel' => '085376470953',
            'statusAkun' => 'Lolos',
            'tanggalLahir' => '2022-11-08',
            'jurusan' => 'D-IV Komputasi Statistik',
            'tahunLulus' => '2015',
            'skpenempatan1bps' => 'skpenempatan1bps/skpenempatan1bpsdummy.pdf',
            'skatasanbps' => 'skatasanbps/skatasanbpsdummy.pdf',
        ]);
        $alumni3->assignRole('alumni');

        // Buat seed untuk manajemen data alumni (add ijazah asli dan transkrip nilai)
        $data1 = dataalumni::create([
            'name' => 'M Zaki',
            'nim' => '222011686',
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);
        $data1 = dataalumni::create([
            'name' => 'M Zaki',
            'nim' => '222011686',
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);
        $data1 = dataalumni::create([
            'name' => 'M Zaki',
            'nim' => '222011686',
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);
        $data1 = dataalumni::create([
            'name' => 'M Zaki',
            'nim' => '222011686',
            'ijazahasli' => 'ijazahasli/contohijazah.pdf',
            'transkripnilaiasli' => 'transkripnilaiasli/contohtranskrip.pdf',
        ]);
    }
}