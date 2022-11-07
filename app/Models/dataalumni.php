<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataalumni extends Model
{
    use HasFactory;
    protected $table = 'dataalumni';
    protected $fillable = [
        'name',
        'nip',
        'nim',
        'jurusan',
        'tahunLulus',
        'tempatLahir',
        'tanggalLahir',
        'nomorPonsel',
        'email',
        'password',
        'jenisKelamin',
        'transkripnilaiasli',
        'ijazahasli',
    ];
}