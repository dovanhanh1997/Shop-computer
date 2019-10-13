<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGithubProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubProviderCallBack()
    {
        $user = Socialite::driver('github')->user();

        $githubUser = $this->findOrCreateUser($user);

        Auth::login($githubUser, true);

        return redirect('/');

    }

    public function findOrCreateUser($user)
    {
        if (User::find($user->id)) return User::find($user->id);

        return User::create([
            'id' => $user->id,
            'name' => $user->nickname,
            'email' => $user->email,
        ]);
    }


    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookProviderCallBack()
    {
        $user = Socialite::driver('facebook')->user();
        dd($user);
        $facebookUser = $this->findOrCreateUser($user);

        Auth::login($facebookUser, true);

        return redirect('/');

    }
}
