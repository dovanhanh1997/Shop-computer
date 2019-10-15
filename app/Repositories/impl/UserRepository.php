<?php


namespace App\Repositories\impl;


use App\Repositories\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{

    public function getAll()
    {
        return User::all();
    }

    public function create($request)
    {
        return User::create($request->all());
    }

    public function findById($id)
    {
        return User::find($id);
    }

    public function update($request, $id)
    {
        $user = $this->findById($id);
        return $user->update($request->all());
    }

    public function delete($id)
    {
        $user = $this->findById($id);
        return $user->delete();
    }
}
