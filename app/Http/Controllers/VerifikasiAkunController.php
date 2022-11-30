<?php

namespace App\Http\Controllers;

use App\Mail\MailVerifikasi;
use App\Mail\MailVerifikasiTolak;
use App\Mail\MyTestMail;
use Illuminate\Http\Request;
use App\Models\dataalumni;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class VerifikasiAkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.verifikasiakun', [
            'alumni' => User::role('alumni')->orderBy('statusAkun', 'asc')->get(),
        ]);
    }
    public function verif($id)
    {
        return view('admin.konfirmasi', [
            'user' => User::role('alumni')->orderBy('statusAkun', 'asc')->where('id', $id)->get(),
            // 'alumni' => User::role('alumni')->orderBy('statusAkun', 'asc')->get(),
            'alumni' => dataalumni::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setujuiakun($id)
    // id disini adalah tanggal lahir
    {
        $id_user = $_POST['id_user'];
        // $users = DB::table('dataalumni')->where('name', $name)->first();
        $users = dataalumni::where('id', $id)->first();

        DB::table('users')
            ->where('id', $id_user)
            ->update(['statusAkun' => 'Lolos', 'nim' => $users->nim, 'tahunLulus' => $users->tahunLulus, 'tempatLahir' => $users->tempatLahir]);
        $user = DB::table('users')->where('id', $id_user)->first();

        $email = $user->email;
        $data = ([
            'name' => $users->name,
            'email' => $users->email,
            'nim' => $users->nim,
        ]);
        Mail::to($email)->send(new MailVerifikasi($data));
        return redirect('/verifikasiindex')->with('success', 'Akun berhasil diverifikasi');
    }

    public function tolakakun($id)
    {
        // $users = dataalumni::where('id', $id)->first();

        // $email = $users->email;
        // $data = ([
        //     'name' => $users->name,
        //     'email' => $users->email,
        //     'nim' => $users->nim,
        // ]);

        DB::table('users')
            ->where('id', $id)
            ->update(['statusAkun' => 'Ditolak', 'nim' => null, 'tahunLulus' => null]);
        $user = DB::table('users')->where('id', $id)->first();

        $email = $user->email;
        $data = ([
            'name' => $user->name,
            'email' => $user->email,
            'nim' => $user->nim,
        ]);
        Mail::to($email)->send(new MailVerifikasiTolak($data));
        return redirect('/verifikasiindex')->with('success', 'Akun berhasil ditolak');
    }

    public function pendingakun($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['statusAkun' => 'Pending']);
        return redirect('/verifikasiindex')->with('success', 'Akun berhasil dipending');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
