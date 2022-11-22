<?php

namespace App\Exports;

use App\Models\dataalumni;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataAlumniExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return dataalumni::all();
    }
}