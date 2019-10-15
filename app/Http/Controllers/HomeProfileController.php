<?php

namespace App\Http\Controllers;

use App\Services\ProfileServiceInterface;
use Illuminate\Http\Request;

class HomeProfileController extends Controller
{
    /**
     * @var ProfileServiceInterface
     */
    private $profileService;

    public function __construct(ProfileServiceInterface $profileService)
    {
        $this->profileService = $profileService;
    }

    public function registerProfile()
    {
        return view('home.user.registerProfile');
    }

    public function storeProfile(Request $request)
    {
        $this->profileService->storeProfile($request);

        return redirect()->route('home');
    }
}
