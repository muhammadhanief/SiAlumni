<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class FormulirController extends Controller
{
    //
    public function index()
    {
        return view('formulir');
    }
}