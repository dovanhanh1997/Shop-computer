<?php


namespace App\Repositories;


interface BillRepositoryInterface extends CRUDRepository
{
    public function store($bill);

    public function findByUserId($id);
}
