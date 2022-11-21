<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataalumni extends Model
{
    use HasFactory;
    protected $table = 'dataalumni';
    protected $fillable = [
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
        'tahunLulus',
        'transkripnilaiasli',
        'ijazahasli',
    ];
}