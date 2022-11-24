<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'last_name' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            // 'current_password' => 'nullable|required_with:new_password',
            // 'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            // 'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
            // 'last_name' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'numeric', 'digits:18'],
            'nim' => ['required', 'string'],
            'nomorPonsel' => ['required', 'numeric', 'digits_between:11,13'],
            // 'tahunLulus' => ['required', 'numeric', 'digits:4']
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        // $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        $user->nip = $request->input('nip');
        $user->nim = $request->input('nim');
        $user->jurusan = $request->input('jurusan');
        // $user->tahunLulus = $request->input('tahunLulus');
        // $user->tempatLahir = $request->input('tempatLahir');
        // $user->tanggalLahir = $request->input('tanggalLahir');
        $user->nomorPonsel = $request->input('nomorPonsel');


        // if (!is_null($request->input('current_password'))) {
        //     if (Hash::check($request->input('current_password'), $user->password)) {
        //         $user->password = $request->input('new_password');
        //     } else {
        //         return redirect()->back()->withInput();
        //     }
        // }

        $user->save();
        return redirect()->route('home')->withSuccess('Profile updated successfully.');
    }
}