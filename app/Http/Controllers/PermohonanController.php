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
        $users = User::all();


        if ($user == 'kepalabaak') {
            $data = DB::table('permohonan')
                ->where('status', "Disetujui Petugas BAAK")
                ->get();
        } elseif ($user == 'wadir1') {
            $data = DB::table('permohonan')
                ->where('status', "Disetujui Kepala BAAK")
                ->get();
        } elseif ($user == 'petugasbaak') {
            $data = DB::table('permohonan')
                ->where('status', "Menunggu")
                ->orWhere('status', 'Ditolak Petugas BAAK')
                ->orWhere('status', 'Ditolak Kepala BAAK')
                ->orWhere('status', 'Ditolak Kepala Wakil Direktur 1')
                ->get();
        } else {
            $data = Permohonan::all();
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
                'users' => $users
            ]
        );
    }

    public function setuju($id)
    {
        $data = Permohonan::find($id);

        $user = Auth::user()->roles->first()->name;

        if ($data->status == "Menunggu" || $user == 'petugasbaak') {
            $data->status = "Disetujui Petugas BAAK";
        } elseif ($data->status == "Disetujui Petugas BAAK" || $user == 'kepalabaak') {
            $data->status = "Disetujui Kepala BAAK";
        } elseif ($data->status == "Disetujui Kepala BAAK" || $user == 'wadir1') {
            $data->status = "Disetujui Wakil Direktur 1";
        } elseif ($data->status == "Disetujui Wakil Direktur 1") {
            $data->status = "Disetujui Wakil Direktur 1";
        } elseif ($user == 'superadmin') {
            $data->status = "Disetujui Petugas BAAK";
        }

        $data->save();

        return redirect('/permohonan')->with('success', 'Permohonan berhasil disetujui');
    }

    public function tolak($id)
    {
        $data = Permohonan::find($id);

        // cek role user
        $user = Auth::user()->roles->first()->name;
        if ($user == 'petugasbaak') {
            $data->status = "Ditolak Petugas BAAK";
        } elseif ($user == 'kepalabaak') {
            $data->status = "Ditolak Kepala BAAK";
        } elseif ($user == 'wadir1') {
            $data->status = "Ditolak Wakil Direktur 1";
        } elseif ($user == 'superadmin') {
            $data->status = "Ditolak Petugas BAAK";
        }

        $data->save();

        return redirect('/permohonan')->with('success', 'Permohonan berhasil ditolak');
    }
}
