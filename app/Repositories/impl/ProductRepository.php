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

    public function create($product, $request)
    {
        $product->productName = $request->productName;
        $product->productPrice = $request->productPrice;
    }

    public function findById($id)
    {
        return Product::find($id);
    }

    public function update($request, $product)
    {
        $product->productName = $request->productName;
        $product->productPrice = $request->productPrice;
    }

    public function delete($id)
    {
        $product = $this->findById($id);
        return $product->delete();
    }

    public function storeImage($product)
    {
        if (request()->has('image')) {
            $product->image = request()->image->store('uploads', 'public');
        }
    }

    public function saveData($product)
    {
        return $product->save();
    }
}
