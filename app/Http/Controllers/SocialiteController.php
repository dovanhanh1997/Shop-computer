<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallBack($social)
    {
        $user = Socialite::driver($social)->stateless()->user();
        $socialUser = $this->findOrCreateUser($user);

        Auth::login($socialUser, true);
        $userId = $user->id;
        return redirect("/home/$userId");
    }

    public function findOrCreateUser($socialUser)
    {
        if (User::find($socialUser->id)) return User::find($socialUser->id);
        $socialName = null;
        if ($socialUser->nickname) {
            $socialName = $socialUser->nickname;
        } else if ($socialUser->name) {
            $socialName = $socialUser->name;
        }
        $newUser = new User();
        $newUser->id = $socialUser->id;
        $newUser->name = $socialName;
        $newUser->save();

        return $newUser;
    }

}
