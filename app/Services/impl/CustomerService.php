<?php


namespace App\Services\impl;


use App\Repositories\CustomerRepositoryInterface;
use App\Services\CustomerServiceInterface;

class CustomerService implements CustomerServiceInterface
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        return $this->customerRepository->getAll();
    }

    public function create($request)
    {
        return $this->customerRepository->create($request);
    }

    public function findById($id)
    {
        return $this->customerRepository->findById($id);
    }

    public function update($request, $id)
    {
        return $this->customerRepository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->customerRepository->delete($id);
    }
}
