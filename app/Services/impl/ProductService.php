<?php


namespace App\Services\impl;


use App\Product;
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
        $product = new Product();
        $this->productRepository->create($product, $request);
        $this->productRepository->storeImage($product);
        return $this->productRepository->saveData($product);
    }

    public function findById($id)
    {
        return $this->productRepository->findById($id);
    }

    public function update($request, $id)
    {
        $product = $this->productRepository->findById($id);
        $this->productRepository->update($request, $product);
        $this->productRepository->storeImage($product);
        return $this->productRepository->saveData($product);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

    public function getPaginate($number)
    {
        return $this->productRepository->getPaginate($number);
    }

    public function findByKey($keySearch)
    {
        return $this->productRepository->findByKey($keySearch);
    }
}
