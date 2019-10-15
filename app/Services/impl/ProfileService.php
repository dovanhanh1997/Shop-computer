<?php


namespace App\Services\impl;


use App\Profile;
use App\Repositories\ProfileRepositoryInterface;
use App\Services\ProfileServiceInterface;
use Illuminate\Support\Facades\Auth;

class ProfileService implements ProfileServiceInterface
{
    /**
     * @var ProfileRepositoryInterface
     */
    private $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    public function storeProfile($request)
    {
        $profile = new Profile();
        $profile->user_id   = Auth::user()->id;
        $profile->profileFullName = $request->profileName;
        $profile->profilePhone = $request->profilePhone;
        $profile->image = $request->image;
        $this->profileRepository->storeProfile($profile);
    }
}
