<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validate =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nip' => ['required', 'string', 'max:255'],
            // 'nim' => ['required', 'string', 'max:255'],
            'jurusan' => ['required', 'string', 'max:255'],
            // 'tahunLulus' => ['required', 'string', 'max:255'],
            'tempatLahir' => ['required', 'string', 'max:255'],
            'tanggalLahir' => ['required', 'string', 'max:255'],
            'nomorPonsel' => ['required', 'string', 'max:255'],
            // 'jenisKelamin' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'skpenempatan1bps' => 'required|mimes:pdf',
            'skatasanbps' => 'required|mimes:pdf',
        ]);

        $validate['skpenempatan1bps'] = $request->file('skpenempatan1bps')->store('skpenempatan1bps');
        $validate['skatasanbps'] = $request->file('skatasanbps')->store('skatasanbps');
        $validate['password'] = Hash::make($request->password);
        $user = User::create($validate);
        $user->assignRole('alumni');


        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);
        // return redirect('login');
        return redirect()->route('login')->withSuccess('Berhasil Melakukan Register, Silakan Login');
        // return redirect(RouteServiceProvider::HOME);
    }
}