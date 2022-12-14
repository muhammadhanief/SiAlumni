<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dataalumni;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jumlahalumni = dataalumni::all();
        $jumlahalumni = $jumlahalumni->count();

        //jumlah permohonan dari tabel permohonan
        $jumlahpermohonan = DB::table('permohonan')->count();
        $permohonanbaru = DB::table('permohonan')
            ->where('status', '=', 'Menunggu')
            ->count();

        $lolossyarat = DB::table('permohonan')
            ->where('status', '=', 'Disetujui Petugas BAAK')
            ->count();

        $disetujuikepalabaak = DB::table('permohonan')
            ->where('status', '=', 'Disetujui Kepala BAAK')
            ->count();

        // $permohonanbaru = DB::table('permohonan')
        //     ->where('status', '=', 'Disetujui Wakil Direktur 1')
        //     ->count();

        // jumlah data transkripnilaiasli dari tabel dataalumni
        $transkripnilaiasli = dataalumni::all();
        $transkripnilaiasli = $transkripnilaiasli->count();

        $jumlahtranskrip = DB::table('dataalumni')
            ->whereNotNull('transkripnilaiasli')
            ->count();
        $jumlahijazah = DB::table('dataalumni')
            ->whereNotNull('ijazahasli')
            ->count();
        
        $selesai = DB::table('permohonan')
            ->where('status', '=', 'Selesai')
            ->count();

        return view('admin.dashboard', [
            'jumlahpermohonan' => $jumlahpermohonan,
            'permohonanbaru' => $permohonanbaru,
            'lolossyarat' => $lolossyarat,
            'disetujuikepalabaak' => $disetujuikepalabaak,
            'jumlahalumni' => $jumlahalumni,
            'jumlahtranskrip' => $jumlahtranskrip,
            'jumlahijazah' => $jumlahijazah,
            'selesai' => $selesai,
        ]);
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