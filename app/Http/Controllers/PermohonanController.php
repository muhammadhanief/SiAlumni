<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Faker\Provider\ar_JO\Person;

class PermohonanController extends Controller
{
    public function index()
    {
        // get data from database and pass it to the view
        $data = Permohonan::all();


        // dd($data);
        return view('admin.daftar_permohonan_admin', compact('data'));
    }
}
