<?php

namespace App\Http\Controllers;

use App\Mail\MailPermohonan;
use App\Mail\MailPermohonanPetugas;
use App\Mail\MailPermohonanUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Permohonan;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormulirController extends Controller
{
    //
    public function index()
    {

        $user = Auth::user();

        if($user->tipe_alumni == 'BPS'){

        $tahun = substr($user->nip, 8, 4);
        $bulan = substr($user->nip, 12, 2);
        $tahunsekarang = date("Y");
        $bulansekarang = date("m");
        $selisihdalambulan = ($tahunsekarang - $tahun) * 12 + ($bulansekarang - $bulan);

        if ($selisihdalambulan > 48 || $user->tipe_alumni == "Non-BPS") {
            $eligible = true;
        } else {
            $eligible = false;
        }
    } elseif ($user->tipe_alumni == "Non-BPS") {
        $eligible = true;
    } else {
        $eligible = false;
    }

        return view('formulir_ijazah', [
            'user' => $user,
            'eligible' => $eligible,
        ]);
    }

    public function indexTrans()
    {
        $user = Auth::user();

        if ($user->tipe_alumni == "BPS") {

            $tahun = substr($user->nip, 8, 4);
            $bulan = substr($user->nip, 12, 2);
            $tahunsekarang = date("Y");
            $bulansekarang = date("m");
            $selisihdalambulan = ($tahunsekarang - $tahun) * 12 + ($bulansekarang - $bulan);

            if ($selisihdalambulan > 48) {
                $eligible = true;
            } else {
                $eligible = false;
            }
        } elseif ($user->tipe_alumni == "Non-BPS") {
            $eligible = true;
        } else {
            $eligible = false;
        }

        return view('formulir_transkrip', [
            'user' => $user,
            'eligible' => $eligible,
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => '',
            'jenis' => 'required',
            'catatan' => '',
            // 'file_permohonan' => 'mimes:pdf', //required or not?
            'file_eselon' => 'mimes:pdf', //required or not?
            'file_pusdiklat' => 'mimes:pdf', //required or not?
            'file_kampusln' => 'mimes:pdf', //required or not?
            'file_kuasa' => 'mimes:pdf', //required or not?
            'pengambilan' => 'required',
            'alamat_pengambilan' => 'nullable',
            'email_pengambilan' => 'email|nullable',
            // 'status' => 'Menunggu',
        ]);

        $validate['user_id'] = Auth::user()->id;

        if (isset($request->email_pengambilan)) {
            $validate['email_pengambilan'] = $request->email_pengambilan;
        } else {
            $validate['email_pengambilan'] = Auth::user()->email;
        }
        // $validate['file_permohonan'] = $request->file('file_permohonan')->store('permohonan');
        if ($request->file('file_eselon')) {
            $validate['file_eselon'] = $request->file('file_eselon')->store('permohonan');
        }
        if ($request->file('file_pusdiklat')) {
            $validate['file_pusdiklat'] = $request->file('file_pusdiklat')->store('permohonan');
        }
        if ($request->file('file_kampusln')) {
            $validate['file_kampusln'] = $request->file('file_kampusln')->store('permohonan');
        }
        if ($request->file('file_kuasa')) {
            $validate['file_kuasa'] = $request->file('file_kuasa')->store('permohonan');
        }

        // $validate['file_eselon'] = $request->file('file_eselon')->store('eselon');
        // $validate['file_pusdiklat'] = $request->file('file_pusdiklat')->store('pusdiklat');
        // $validate['file_kampusln'] = $request->file('file_kampusln')->store('kampusln');
        // $validate['file_kuasa'] = $request->file('file_kuasa')->store('kuasa');
        $validate['status'] = 1;
        $emailuser = $validate['email_pengambilan'];
        Permohonan::create($validate);
        // send email to all petugas baak
        $petugasbaak = User::role('petugasbaak')->get();
        foreach ($petugasbaak as $key => $value) {
            $simpan = [
                'name' => $value->name,
                'user' => Auth::user()->name,
                'jenis' => $validate['jenis'],
            ];
            Mail::to($value->email)->send(new MailPermohonanPetugas($simpan));
        }
        $simpan = [
            'name' => Auth::user()->name,
            'jenis' => $validate['jenis'],
        ];
        //send email to user
        Mail::to($emailuser)->send(new MailPermohonanUser($simpan));




        // $file_permohonan = $request->file('file_permohonan');
        // $file_eselon = $request->file('file_eselon');
        // $file_pusdiklat = $request->file('file_pusdiklat');

        // $nama_file_permohonan = time() . "_" . $file_permohonan->getClientOriginalName();
        // $nama_file_eselon = time() . "_" . $file_eselon->getClientOriginalName();
        // $nama_file_pusdiklat = time() . "_" . $file_pusdiklat->getClientOriginalName();

        // $path_permohonan = 'permohonan/permohonan';
        // $path_eselon = 'permohonan/eselon';
        // $path_pusdiklat = 'permohonan/pusdiklat';

        // $file_permohonan->move($path_permohonan, $nama_file_permohonan);
        // $file_eselon->move($path_eselon, $nama_file_eselon);
        // $file_pusdiklat->move($path_pusdiklat, $nama_file_pusdiklat);

        // permohonan::create([
        //     'user_id' => Auth::user()->id,
        //     'permohonan_path' => $path_permohonan . '/' . $nama_file_permohonan,
        //     'eselon_path' => $path_eselon . '/' . $nama_file_eselon,
        //     'pusdiklat_path' => $path_pusdiklat . '/' . $nama_file_pusdiklat,
        //     'pengambilan' => $request->pengambilan,
        //     'alamat_pengambilan' => $request->alamat_pengambilan,
        //     'email_pengambilan' => $request->email_pengambilan,
        //     'status' => 1,
        // ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }
}