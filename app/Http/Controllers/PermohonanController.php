<?php

namespace App\Http\Controllers;

use App\Models\dataalumni;
use App\Models\Legalisir;
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
        // $datasemua = Permohonan::all();
        $user = Auth::user()->roles->first()->name;
        $users_all = User::all();
        $legalisir_all = Legalisir::all();

        // make user id as a key
        $users = [];
        foreach ($users_all as $u) {
            $users[$u->id] = $u;
        }

        $legalisir = [];
        foreach ($legalisir_all as $l) {
            $legalisir[$l->permohonan_id] = $l;
        }

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
                ->orWhere('status', 'Ditolak Wakil Direktur 1')
                ->orWhere('status', 'Disetujui Wakil Direktur 1')
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
                'users' => $users,
                'legalisir' => $legalisir,
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

        // hapus data legalisir
        if ($data->file_legalisir) {
            $data->file_legalisir = null;
        }

        $data->save();


        return redirect('/permohonan')->with('success', 'Permohonan berhasil ditolak');
    }

    public function preupload($id)
    {
        $data = Permohonan::find($id);
        $user = User::find($data->user_id);
        // find dasta alumni usn nim
        $dataalumni = dataalumni::where('nim', $user->nim)->first();


        $content = '
        <div class="row">
            <!-- hidden id -->
            <input type="hidden" name="permohonan_id" id="id" value="' . $data->id . '">

            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="nama">Nama</label>
                    <input type="text" id="nama" class="form-control bg-light border-0" nama="nama" value="' . $user->name . '" readonly>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="nim">Nim</label>
                    <input type="text" id="nim" class="form-control bg-light border-0" nama="nim" value="' . $user->nim . '" readonly>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group focused">
                    <label class="form-control-label" for="status">Status</label>
                    <input type="text" id="status" class="form-control bg-light border-0" nama="status" value="' . $data->status . '" disabled>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="jenis">Jenis</label>
                                    <input type="text" id="jenis" class="form-control bg-light border-0" name="jenis" value="' . $data->jenis . '" disabled>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <p class="form-control-label">File Ijazah</p>   
                        <a href="' . asset('storage/' . $dataalumni->ijazahasli) . '" target="_blank" class="btn btn-primary btn-sm">Unduh File</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <p class="form-control-label">File Transkrip Nilai</p>   
                        <a href="' . asset('storage/' . $dataalumni->transkripnilaiasli) . '" target="_blank" class="btn btn-primary btn-sm">Unduh File</a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-control-label" for="">Dokumen Legalisir<span class="small text-danger">*</span></label>
                    <input type="file" class="form-control form-control-user pt-2" name="file_legalisir" placeholder="" required>
                    <br>
                </div>
            </div>

        </div>
        ';

        return $content;
    }

    public function upload(Request $request)
    {

        $validate = $request->validate([
            'permohonan_id' => 'required',
            'file_legalisir' => 'required|mimes:pdf',
        ]);

        $validate['file_legalisir'] = $request->file('file_legalisir')->store('file_legalisir');

        Legalisir::updateOrCreate(
            ['permohonan_id' => $validate['permohonan_id']],
            ['file_legalisir' => $validate['file_legalisir']]
        );

        return redirect('/permohonan')->with('success', 'File berhasil diupload');
    }

    public function publish($id)
    {
        $data = Permohonan::find($id);
        $legalisir = Legalisir::where('permohonan_id', $id)->first();
        $data->status = "Selesai";
        $data->file_legalisir = $legalisir->file_legalisir;

        $data->save();

        return redirect('/permohonan')->with('success', 'Permohonan berhasil dipublish');
    }

    public function download($id)
    {
        $data = Permohonan::find($id);
        // public path 
        $filePath = public_path() . '/storage/' . $data->file_legalisir;

        $headers = ['Content-Type: application/pdf'];
        $fileName =  'Legalisir_' . $data->jenis . '_' . $data->nim . '_' . time() . '.pdf';

        return response()->download($filePath, $fileName, $headers);
    }
}