<?php


namespace App\Repositories;


interface ProfileRepositoryInterface
{
    public function getAll();

    public function storeProfile($profile);
}
