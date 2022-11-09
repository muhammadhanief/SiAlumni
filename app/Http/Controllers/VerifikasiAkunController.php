<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataalumni;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
    public function setujuiakun($name)
    // id disini adalah tanggal lahir
    {
        // $users = DB::table('dataalumni')->where('name', $name)->first();
        $users = dataalumni::where('name', $name)->first();
        // dd($users);
        DB::table('users')
            ->where('name', $name)
            // ->update(['statusAkun' => 'Lolos', 'nim' => $users->nim]);
            ->update(['statusAkun' => 'Lolos', 'nim' => $users->nim]);
        return redirect('/verifikasiindex')->with('success', 'Akun berhasil diverifikasi');
    }

    public function tolakakun($id)
    {
        DB::table('users')
            ->where('id', $id)
            ->update(['statusAkun' => 'Ditolak']);
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