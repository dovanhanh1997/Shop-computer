<?php


namespace App\Services\impl;


use App\Repositories\ProductRepositoryInterface;
use App\Services\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function create($request)
    {
        return $this->productRepository->create($request);
    }

    public function findById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function update($request, $id)
    {
        return $this->productRepository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
