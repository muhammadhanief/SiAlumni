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
                                    <label class="form-control-label" for="name">Nama</label>
                                    <input type="text" id="name" class="form-control bg-light border-0" name="name" value="' . $alumni->name . '" disabled>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="nim">NIM</label>
                                    <input type="text" id="nim" class="form-control bg-light border-0" name="nim" value="' . $alumni->nim . '" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Dokumen Ijazah</label>
                                    <!-- <input class="form-control form-control-user" type="file" name="ijazahasli"
                                        id="ijazahasli"> -->
                                    <input type="file" class="form-control form-control-user pt-2" name="ijazahasli" placeholder=" {{ __(\'SK Penempatan 1 BPS\') }}">
                                    <br>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="">Dokumen Transkrip Nilai</label>
                                    <!-- <input class="form-control form-control-user" type="file" name="transkripnilaiasli"
                                        id="transkripnilaiasli"> <br> -->

                                    <input type="file" class="form-control form-control-user pt-2" name="transkripnilaiasli" placeholder=" {{ __(\'SK Penempatan 1 BPS\') }}" >
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
            'ijazahasli' => 'mimes:pdf',
            'transkripnilaiasli' => 'mimes:pdf',
        ]);

        if (!request()->hasFile('ijazahasli')) {
            DB::table('dataalumni')->where('id', $request->id)->update([
                'transkripnilaiasli' => $request->file('transkripnilaiasli')->store('transkripnilaiasli')
            ]);
        } elseif (!request()->hasFile('transkripnilaiasli')) {
            DB::table('dataalumni')->where('id', $request->id)->update([
                'ijazahasli' => $request->file('ijazahasli')->store('ijazahasli')
            ]);
        } else {
            DB::table('dataalumni')->where('id', $request->id)->update([
                'ijazahasli' => $request->file('ijazahasli')->store('ijazahasli'),
                'transkripnilaiasli' => $request->file('transkripnilaiasli')->store('transkripnilaiasli')
            ]);
        }


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
