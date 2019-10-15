<?php


namespace App\Services;


interface ProfileServiceInterface
{
    public function getAll();

    public function storeProfile($request);
}
