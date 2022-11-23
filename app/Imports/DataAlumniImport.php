<?php

namespace App\Imports;

use App\Models\dataalumni;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataAlumniImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return dd($row);

        //  get nip from databas

        $nip = dataalumni::where('nim', $row['nim'])->first();
        if ($nip == null) {

            return new dataalumni([
                // 'tahunMasuk' => $row[0],
                // 'nim' => $row[1],
                // 'name' => $row[2],
                // 'noIjazahNasional' => $row[3],
                // 'nik'  => $row[4],
                // 'agama'  => $row[5],
                // 'tempatLahir' => $row[6],
                // 'tanggalLahir' => $row[7],
                // 'prodi' => $row[8],
                // 'peminatan' => $row[9],
                // 'kelas' => $row[10],
                // 'status' => $row[11],
                // 'ipk' => $row[12],
                // 'peringkat' => $row[13],
                // 'noHp' => $row[14],
                // 'kabDomisiliPmb' => $row[15],
                // 'provDomisiliPmb' => $row[16],
                // 'tahunLulus' => $row[17],
                // 'transkripnilaiasli',
                // 'ijazahasli',

                'tahunMasuk' => $row['tahun_masuk'],
                'nim' => $row['nim'],
                'name' => $row['nama_lengkap'],
                'noIjazahNasional' => $row['no_ijazah_nasional'],
                'nik' => $row['nik'],
                'agama' => $row['agama'],
                'tempatLahir' => $row['tempat_lahir'],
                'tanggalLahir' => $row['tanggal_lahir'],
                'prodi' => $row['prodi'],
                'peminatan' => $row['peminatan'],
                'kelas' => $row['kelas'],
                'status' => $row['status'],
                'ipk' => $row['ipk'],
                'peringkat' => $row['peringkat'],
                'noHp' => $row['nohp'],
                'kabDomisiliPmb' => $row['kab_domisili_pmb'],
                'provDomisiliPmb' => $row['prov_domisili_pmb'],
                'provDaftarPmb' => $row['prov_daftar_pmb'],
                // 'tahunLulus' => $row['tahunLulus'],
                'transkripnilaiasli' => "ijazahasli/contohijazah.pdf",
                'ijazahasli' => "transkripnilaiasli/contohtranskrip.pdf",
            ]);
        }
    }
}
