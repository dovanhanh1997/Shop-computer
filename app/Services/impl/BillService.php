<?php


namespace App\Services\impl;


use App\Repositories\BillRepositoryInterface;
use App\Services\BillServiceInterface;

class BillService implements BillServiceInterface
{
    /**
     * @var BillRepositoryInterface
     */
    private $billRepository;

    public function __construct(BillRepositoryInterface $billRepository)
    {
        $this->billRepository = $billRepository;
    }

    public function getAll()
    {
        return $this->billRepository->getAll();
    }

    public function create($request)
    {
        return $this->billRepository->create($request);
    }

    public function findById($id)
    {
        return $this->billRepository->findById($id);
    }

    public function update($request, $id)
    {
        return $this->billRepository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->billRepository->delete($id);
    }
}
