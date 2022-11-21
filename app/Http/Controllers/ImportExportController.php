<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Exports\UsersExport;
// use App\Imports\UsersImport;
use App\Imports\DataAlumniImport;
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
}