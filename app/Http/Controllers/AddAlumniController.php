<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dataalumni;

class AddAlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexsemuaalumni()
    {
        //
        return view('admin.manajemen_alumni', [
            'alumni' => dataalumni::all(),
        ]);
    }

    public function index()
    {
        //
        return view('admin.alumniadd', []);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $validate =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255'],
            // 'nip' => ['required', 'string', 'max:255'],
            'nim' => ['required', 'string', 'max:255'],
            // 'jurusan' => ['required', 'string', 'max:255'],
            // 'tahunLulus' => ['required', 'string', 'max:255'],
            // 'tempatLahir' => ['required', 'string', 'max:255'],
            // 'tanggalLahir' => ['required', 'string', 'max:255'],
            // 'nomorPonsel' => ['required', 'string', 'max:255'],
            // 'name' => ['required', 'string', 'max:255'],
            'ijazahasli' => 'required|mimes:pdf',
            'transkripnilaiasli' => 'required|mimes:pdf',
        ]);

        // $validate['ijazahasli'] = $request->file('ijazahasli')->store('ijazahasli');
        // $validate['transkripnilaiasli'] = $request->file('transkripnilaiasli')->store('transkripnilaiasli');
        DB::table('dataalumni')->insert([
            'name' => $request->input('name'),
            // 'email' => $request->input('email'),
            // 'nip' => $request->input('nip'),
            'nim' => $request->input('nim'),
            // 'jurusan' => $request->input('jurusan'),
            // 'jurusan' => 'D-IV Komputasi Statistik',
            // 'tahunLulus' => $request->input('tahunLulus'),
            // 'tempatLahir' => $request->input('tempatLahir'),
            // 'tanggalLahir' => $request->input('name'),
            // 'nomorPonsel' => $request->input('nomorPonsel'),
            // 'jenisKelamin' => $request->input('jenisKelamin'),
            'ijazahasli' => $request->file('ijazahasli')->store('ijazahasli'),
            'transkripnilaiasli' => $request->file('transkripnilaiasli')->store('transkripnilaiasli'),
        ]);
        return redirect()->route('addalumni')->withSuccess('Data Berhasil Ditambahkan.');
        // $user = dataalumni::create($validate);
        // $user->assignRole('alumni');
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