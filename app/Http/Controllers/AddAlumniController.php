<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\dataalumni;
use PhpParser\Node\Stmt\Echo_;

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

    public function get_alumni($id)
    {
        $alumni = dataalumni::find($id);

        $htmlcontent = ' 
                        <div class="row">

                            <!-- hidden id -->
                            <input type="hidden" name="id" id="id" value="' . $alumni->id . '">

                            <div class="col-lg-6">
                                <div class="form-group focused">
                                    <label class="form-control-label" for="name">Nama<span class="small text-danger">*</span></label>
                                    <input type="text" id="name" class="form-control bg-light border-0" name="name" value="' . $alumni->name . '" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nim">NIM<span class="small text-danger">*</span></label>
                                    <input type="text" id="nim" class="form-control bg-light border-0" name="nim" value="' . $alumni->nim . '" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Dokumen Ijazah<span class="small text-danger">*</span></label>
                                    <!-- <input class="form-control form-control-user" type="file" name="ijazahasli"
                                        id="ijazahasli"> -->
                                    <input type="file" class="form-control form-control-user pt-2" name="ijazahasli" placeholder=" {{ __(\'SK Penempatan 1 BPS\') }}" required>
                                    <br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Dokumen Transkrip Nilai<span class="small text-danger">*</span></label>
                                    <!-- <input class="form-control form-control-user" type="file" name="transkripnilaiasli"
                                        id="transkripnilaiasli"> <br> -->

                                    <input type="file" class="form-control form-control-user pt-2" name="transkripnilaiasli" placeholder=" {{ __(\'SK Penempatan 1 BPS\') }}" required>
                                </div>
                            </div>
                        </div>
                    ';
        // dd($htmlcontent);
        echo $htmlcontent;
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
            'id' => 'required',
            // 'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255'],
            // 'nip' => ['required', 'string', 'max:255'],
            // 'nim' => ['required', 'string', 'max:255'],
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
        DB::table('dataalumni')->where('id', $request->id)->update([
            // 'name' => $request->input('name'),
            // 'email' => $request->input('email'),
            // 'nip' => $request->input('nip'),
            // 'nim' => $request->input('nim'),
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

        return redirect()->route('manajemen_alumni')->withSuccess('Data Berhasil Ditambahkan.');
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
