<?php


namespace App\Repositories;


interface ProductRepositoryInterface
{
    public function getAll();

    public function create($product, $request);

    public function findById($id);

    public function update($request, $product);

    public function delete($id);

    public function storeImage($product);

    public function saveData($product);

    public function getPaginate($number);
}
