<?php

namespace App\Exports;

use App\Models\dataalumni;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataAlumniExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'id',
            'Tahun Masuk',
            'NIM',
            'Nama Lengkap',
            'No Ijazah Nasional',
            'NIK',
            'Agama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Prodi',
            'Peminatan',
            'Kelas',
            'Status',
            'IPK',
            'Peringkat',
            'No.HP',
            'Kab Domisili PMB',
            'Prov Domisili PMB',
            'Prov Daftar PMB',
            // 'tahun Lulus',
            // 'ijazahasli',
            // 'transkripnilaiasli',
            // 'remember_token',
            // 'created_at',
            // 'updated_at',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return dataalumni::all();
        return dataalumni::select(
            'id',
            'tahunMasuk',
            'nim',
            'name',
            'noIjazahNasional',
            'nik',
            'agama',
            'tempatLahir',
            'tanggalLahir',
            'prodi',
            'peminatan',
            'kelas',
            'status',
            'ipk',
            'peringkat',
            'noHp',
            'kabDomisiliPmb',
            'provDomisiliPmb',
            'provDaftarPmb',
        )->get();
    }
}