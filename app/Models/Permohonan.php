<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $table = 'permohonan';

    protected $fillable = [
        'user_id',
        'jenis',
        // 'file_permohonan',
        'catatan',
        'file_eselon',
        'file_pusdiklat',
        'file_kampusln',
        'file_kuasa',
        'pengambilan',
        'alamat_pengambilan',
        'email_pengambilan',
        'resi',
        'status',
        'file_legalisir',
        'time_petugas_baak',
        'time_kepala_baak',
        'time_wadir_1',
        'time_tolak',
        'time_selesai',
    ];
}
