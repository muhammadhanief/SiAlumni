<?php

namespace App\Imports;

use App\Models\dataalumni;
use Maatwebsite\Excel\Concerns\ToModel;

class DataAlumniImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return dd($row);
        return new dataalumni([
            'tahunMasuk' => $row[0],
            'nim' => $row[1],
            'name' => $row[2],
            'noIjazahNasional' => $row[3],
            'nik'  => $row[4],
            'agama'  => $row[5],
            'tempatLahir' => $row[6],
            'tanggalLahir' => $row[7],
            'prodi' => $row[8],
            'peminatan' => $row[9],
            'kelas' => $row[10],
            'status' => $row[11],
            'ipk' => $row[12],
            'peringkat' => $row[13],
            'noHp' => $row[14],
            'kabDomisiliPmb' => $row[15],
            'provDomisiliPmb' => $row[16],
            'tahunLulus' => $row[17],
            // 'transkripnilaiasli',
            // 'ijazahasli',

            // 'tahunMasuk' => $row['tahunMasuk'],
            // 'nim' => $row['nim'],
            // 'name' => $row['name'],
            // 'noIjazahNasional' => $row['noIjazahNasional'],
            // 'nik' => $row['nik'],
            // 'agama' => $row['agama'],
            // 'tempatLahir' => $row['tempatLahir'],
            // 'tanggalLahir' => $row['tanggalLahir'],
            // 'prodi' => $row['prodi'],
            // 'peminatan' => $row['peminatan'],
            // 'kelas' => $row['kelas'],
            // 'status' => $row['status'],
            // 'ipk' => $row['ipk'],
            // 'peringkat' => $row['peringkat'],
            // 'noHp' => $row['noHp'],
            // 'kabDomisiliPmb' => $row['kabDomisiliPmb'],
            // 'provDomisiliPmb' => $row['provDomisiliPmb'],
            // 'tahunLulus' => $row['tahunLulus'],
            // // 'transkripnilaiasli',
            // // 'ijazahasli',
        ]);
    }
}