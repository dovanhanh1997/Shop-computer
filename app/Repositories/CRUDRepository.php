<?php


namespace App\Repositories;


interface CRUDRepository
{
    public function getAll();

    public function create($request);

    public function findById($id);

    public function update($request, $id);

    public function delete($id);
}
