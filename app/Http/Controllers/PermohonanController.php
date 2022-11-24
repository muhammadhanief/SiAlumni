<?php

namespace App\Http\Controllers;

use App\Mail\MailKepalaBaak;
use App\Mail\MailPetugasBaak;
use App\Mail\MailPublish;
use App\Mail\MailWadir1;
use App\Models\dataalumni;
use App\Models\Legalisir;
use Illuminate\Http\Request;
use App\Models\Permohonan;
use Faker\Provider\ar_JO\Person;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PermohonanController extends Controller
{
    public function index()
    {
        // get data from database and pass it to the view
        // $datasemua = Permohonan::all();
        $user = Auth::user()->roles->first()->name;
        $users_all = User::all();
        $legalisir_all = Legalisir::all();

        $ispetugasbaak = false;
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
            $data = Permohonan::all();
            $ispetugasbaak = true;
            // $data = DB::table('permohonan')
            //     ->where('status', "Menunggu")
            //     ->orWhere('status', 'Ditolak Petugas BAAK')
            //     ->orWhere('status', 'Ditolak Kepala BAAK')
            //     ->orWhere('status', 'Ditolak Wakil Direktur 1')
            //     ->orWhere('status', 'Disetujui Wakil Direktur 1')
            //     ->get();
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
                'ispetugasbaak' => $ispetugasbaak,
            ]
        );
    }

    public function setuju($id)
    {
        $data = Permohonan::find($id);
        $akun = User::find($data->user_id);
        // get user kepala baak
        $kepalabaak = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'kepalabaak');
            }
        )->first();

        $wadir = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'wadir1');
            }
        )->first();

        // all petugas baak
        $petugasbaak = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'petugasbaak');
            }
        )->get();

        // dd($petugasbaak);

        $user = Auth::user()->roles->first()->name;

        if ($data->status == "Menunggu" || $user == 'petugasbaak') {
            $data->status = "Disetujui Petugas BAAK";
            $data->time_petugas_baak = date('Y-m-d H:i:s');
            $simpan = [
                'user' => $kepalabaak->name,
                'name' => $akun->name,
                'jenis' => $data->jenis,
            ];

            $email = 'zakiramadhanii88@gmail.com'; // $kepalabaak->email

            Mail::to($email)->send(new MailKepalaBaak($simpan));
        } elseif ($data->status == "Disetujui Petugas BAAK" || $user == 'kepalabaak') {
            $data->status = "Disetujui Kepala BAAK";
            $data->time_kepala_baak = date('Y-m-d H:i:s');
            $simpan = [
                'user' => $wadir->name,
                'name' => $akun->name,
                'jenis' => $data->jenis,
            ];
            // $email = $wadir->email;
            $email = 'zakiramadhanii88@gmail.com';
            Mail::to($email)->send(new MailWadir1($simpan));
        } elseif ($data->status == "Disetujui Kepala BAAK" || $user == 'wadir1') {
            $data->status = "Disetujui Wakil Direktur 1";
            $data->time_wadir_1 = date('Y-m-d H:i:s');

            /// send email to all petugas baak
            foreach ($petugasbaak as $p) {
                $simpan = [
                    'user' => $p->name,
                    'name' => $akun->name,
                    'jenis' => $data->jenis,
                ];
                // $email = $p->email;
                $email = 'zakiramadhanii88@gmail.com';
                Mail::to($email)->send(new MailPetugasBaak($simpan));
            }
        } elseif ($data->status == "Disetujui Wakil Direktur 1") {
            $data->status = "Disetujui Wakil Direktur 1";
            $data->time_wadir_1 = date("Y-m-d H:i:s");
        } elseif ($user == 'superadmin') {
            $data->status = "Disetujui Petugas BAAK";
            $data->time_petugas_baak = date("Y-m-d H:i:s");
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
            $data->time_tolak = date("Y-m-d H:i:s");
        } elseif ($user == 'kepalabaak') {
            $data->status = "Ditolak Kepala BAAK";
            $data->time_tolak = date("Y-m-d H:i:s");
        } elseif ($user == 'wadir1') {
            $data->status = "Ditolak Wakil Direktur 1";
            $data->time_tolak = date("Y-m-d H:i:s");
        } elseif ($user == 'superadmin') {
            $data->status = "Ditolak Petugas BAAK";
            $data->time_tolak = date("Y-m-d H:i:s");
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
            '
            . ($data->jenis == "ijazah" ? '
            <div class="col-lg-6">
                <div class="form-group">
                    <p class="form-control-label">File Ijazah</p>   
                        <a href="' . asset('storage/' . $dataalumni->ijazahasli) . '" download="Ijazah_' . $user->nim . '_' . $user->name . '" class="btn btn-primary btn-sm">Unduh File</a>
                </div>
            </div>'
                : '
            <div class="col-lg-6">
                <div class="form-group">
                    <p class="form-control-label">File Transkrip Nilai</p>   
                        <a href="' . asset('storage/' . $dataalumni->transkripnilaiasli) . '" download="Transkrip_' . $user->nim . '_' . $user->name . '" class="btn btn-primary btn-sm">Unduh File</a>
                </div>
            </div>'
            ) . '
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
        $data->time_selesai = date("Y-m-d H:i:s");
        $data->file_legalisir = $legalisir->file_legalisir;
        $akun = User::find($data->user_id);
        $simpan = [
            'name' => $akun->name,
            'jenis' => $data->jenis,
        ];
        $email = $data->email_pengambilan;
        Mail::to($email)->send(new MailPublish($data));
        $data->save();

        return redirect('/permohonan')->with('success', 'Permohonan berhasil dipublish');
    }

    public function download($id)
    {
        $data = Permohonan::find($id);
        $user = User::find($data->user_id);
        // public path 
        $filePath = public_path() . '/storage/' . $data->file_legalisir;



        $headers = ['Content-Type: application/pdf'];
        $fileName =  'Legalisir_' . $data->jenis . '_' . $user->nim . '_' . time() . '.pdf';

        return response()->download($filePath, $fileName, $headers);
    }
}
