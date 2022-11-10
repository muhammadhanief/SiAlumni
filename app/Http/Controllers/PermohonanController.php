<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permohonan;
use Faker\Provider\ar_JO\Person;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PermohonanController extends Controller
{
    public function index()
    {
        // get data from database and pass it to the view
        $datasemua = Permohonan::all();
        $user = Auth::user()->roles->first()->name;


        if ($user == 'kepalabaak') {
            $data = DB::table('permohonan')
                ->where('status', "Disetujui Petugas BAAK")
                ->get();
        } elseif ($user == 'wadir1') {
            $data = DB::table('permohonan')
                ->where('status', "Disetujui Kepala BAAK")
                ->get();
        } else {
            $data = DB::table('permohonan')
                ->where('status', "Menunggu")
                ->orWhere('status', 'Ditolak Petugas BAAK')
                ->orWhere('status', 'Ditolak Kepala BAAK')
                ->orWhere('status', 'Ditolak Kepala Wakil Direktur 1')
                ->get();
        }
        // if ($user == 'petugasbaak') {
        //     $data = DB::table('permohonan')
        //         ->where('status', "Menunggu")
        //         ->get();
        // }


        // dd($data);
        return view(
            'admin.daftar_permohonan_admin',
            [
                'data' => $data,
                'user' => $user,
            ]
        );
    }
}