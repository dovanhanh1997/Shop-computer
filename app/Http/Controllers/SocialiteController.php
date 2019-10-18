<?php

namespace App\Http\Controllers;

use App\User;
use http\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider($social)
    {
        if ($social == 'google') return $this->redirectToGoogleProvider();
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallBack($social)
    {
        $user = Socialite::driver($social)->stateless()->user();
        dd($user);
        $this->findOrCreateUser($user);
        $userId = $user->id;
        return redirect(url("http://shop.local/home/login/$userId"));
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
        $newUser->refresh_token = $socialUser->token;
        $newUser->save();

        return $newUser;
    }

    public function redirectToGoogleProvider()
    {
        $parameters = ['access_type' => 'offline'];
        return Socialite::driver('google')->scopes(["https://www.googleapis.com/auth/drive"])->with($parameters)->redirect();
    }

    public function handleProviderGoogleCallback()
    {
        $auth_user = Socialite::driver('google')->user();
        $user = User::updateOrCreate(['email' => $auth_user->email], ['refresh_token' => $auth_user->token, 'name' => $auth_user->name]);
        Auth::login($user, true);
        return redirect()->to('/'); // Redirect to a secure page
    }

}
