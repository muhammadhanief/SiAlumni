<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\MailRegistrasi;
use App\Mail\MailRegistrasiPetugas;
use App\Mail\MyTestMail;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;

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

        $tipe_alumni = $request->tipe_alumni;

        if ($tipe_alumni == "BPS") {
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
                'tipe_alumni' => 'required',
            ]);

            $validate['skpenempatan1bps'] = $request->file('skpenempatan1bps')->store('skpenempatan1bps');
            $validate['skatasanbps'] = $request->file('skatasanbps')->store('skatasanbps');
        }

        if ($tipe_alumni == "Non-BPS") {
            $validate =  $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                // 'nip' => ['required', 'string', 'max:255'],
                'instansi' => ['required', 'string', 'max:255'],

                'jurusan' => ['required', 'string', 'max:255'],

                'tempatLahir' => ['required', 'string', 'max:255'],
                'tanggalLahir' => ['required', 'string', 'max:255'],
                'nomorPonsel' => ['required', 'string', 'max:255'],

                'name' => ['required', 'string', 'max:255'],
                'skatasanlangsung' => 'required|mimes:pdf',
                'sklunastgr' => 'required|mimes:pdf',
                'tipe_alumni' => 'required',
            ]);

            $validate['skatasanlangsung'] = $request->file('skatasanlangsung')->store('skatasanlangsung');
            $validate['sklunastgr'] = $request->file('sklunastgr')->store('sklunastgr');
        }
        
        $emailuser = $validate['email'];
        $email = ['user' => "$emailuser", 'petugas' => 'zakiramadhanii14@gmail.com'];
        foreach ($email as $key => $value) {
            if($key == 'user'){
                Mail::to($value)->send(new MailRegistrasi($validate));
            }if($key == 'petugas'){              
                Mail::to($value)->send(new MailRegistrasiPetugas($validate));
            }
        }

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