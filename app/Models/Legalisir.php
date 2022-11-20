<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legalisir extends Model
{
    use HasFactory;

    protected $table = 'legalisir';

    protected $fillable = [
        'permohonan_id',
        'file_legalisir',
    ];
}
