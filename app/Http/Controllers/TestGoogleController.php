<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class TestGoogleController extends Controller
{
    //
    public function index()
    {
        // echo 'test';
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            // $finduser = User::where('social_id', $user->id)->first();

            $finduser = User::where('email', $user->email)->first();
            if ($finduser) {

                Auth::login($finduser);

                return redirect('/home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    // 'social_id' => $user->id,
                    // 'tanggalLahir' => $user->avatar,
                    // 'tempatLahir' => $user->avatar_original,
                    // 'jurusan' => $user->nickname,
                    // 'social_type' => 'google',
                    'password' => encrypt('my-google')
                    // 'password' => hash('my-google')
                ]);

                Auth::login($newUser);

                return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}