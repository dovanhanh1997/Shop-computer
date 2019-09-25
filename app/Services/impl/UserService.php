<?php


namespace App\Services\impl;


use App\Repositories\UserRepositoryInterface;
use App\Services\UserServiceInterface;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function create($request)
    {
        return $this->userRepository->create($request);
    }

    public function findById($id)
    {
        return $this->userRepository->findById($id);
    }

    public function update($request, $id)
    {
        return $this->userRepository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
