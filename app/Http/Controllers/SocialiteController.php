<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function login($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function response($social)
    {
        $githubUser = Socialite::driver($social)->user();

        $user = User::updateOrCreate(
            [
                'email' => $githubUser->email,
            ],
            [
                'name' => $githubUser->name,
                'avatar' => $githubUser->avatar,
                'token' => $githubUser->token,
                'refresh_token' => $githubUser->refreshToken,
            ]
        );

        Auth::login($user);

        return redirect('/');
    }
}
