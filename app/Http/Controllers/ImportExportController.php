<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Exports\UsersExport;
// use App\Imports\UsersImport;
use App\Imports\DataAlumniImport;
use App\Exports\DataAlumniExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;


class ImportExportController extends Controller
{
    //
    public function import()
    {
        Excel::import(new DataAlumniImport, request()->file('file'));
        // return dd($row);
        return back();
    }

    public function export()
    {
        return Excel::download(new DataAlumniExport, 'users.xlsx');
    }
}