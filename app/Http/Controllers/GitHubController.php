<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Auth;
use Exception;
// use Socialite;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GitHubController extends Controller
{
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function gitCallback()
    {
        try {

            $user = Socialite::driver('github')->user();

            // $searchUser = User::where('github_id', $user->id)->first();
            $searchUser = User::where('email', $user->email)->first();

            if ($searchUser) {

                Auth::login($searchUser);

                return redirect('/home');
            } else {
                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    // 'github_id' => $user->id,
                    'github_id' => 'yes',
                    // 'auth_type' => 'github',
                    'password' => encrypt('gitpwd059')
                ]);

                Auth::login($gitUser);

                return redirect('/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}