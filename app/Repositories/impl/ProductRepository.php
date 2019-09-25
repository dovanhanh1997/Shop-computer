<?php


namespace App\Repositories\impl;


use App\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAll()
    {
        return Product::all();
    }

    public function create($request)
    {
        return Product::create($request->all());
    }

    public function findById($id)
    {
        return Product::find($id);
    }

    public function update($request, $id)
    {
        $product = $this->findById($id);
        return $product->update($request->all());
    }

    public function delete($id)
    {
        $product = $this->findById($id);
        return $product->delete();
    }
}
