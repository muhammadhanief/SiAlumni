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
        'file_permohonan',
        'file_eselon',
        'file_pusdiklat',
        'file_kampusln',
        'file_kuasa',
        'pengambilan',
        'alamat_pengambilan',
        'email_pengambilan',
        'status',
        'file_legalisir',
    ];
}
