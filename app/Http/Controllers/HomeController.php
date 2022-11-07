<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->statusAkun == "Pending") {
            return view('alumni.pendingverif');
        }
        if (auth()->user()->statusAkun == "Ditolak") {
            return view('alumni.ditolakverif');
        } else {
            return view('alumni.home');
        }
    }
}