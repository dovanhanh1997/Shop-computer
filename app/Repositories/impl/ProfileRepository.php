<?php


namespace App\Repositories\impl;


use App\Profile;
use App\Repositories\ProfileRepositoryInterface;

class ProfileRepository implements ProfileRepositoryInterface
{
    /**
     * @var Profile
     */
    private $profile;

    public function __construct(Profile $profile)
    {
        $this->profile = $profile;
    }

    public function getAll()
    {
        return Profile::all();
    }

    public function storeProfile($profile)
    {
        return $profile->save();
    }
}
