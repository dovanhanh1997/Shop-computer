<?php


namespace App\Repositories\impl;


use App\Bill;
use App\Repositories\BillRepositoryInterface;

class BillRepository implements BillRepositoryInterface
{

    public function getAll()
    {
        return Bill::all();
    }

    public function create($request)
    {
        return Bill::create($request->all());
    }

    public function findById($id)
    {
        return Bill::find($id);
    }

    public function update($request, $id)
    {
        $bill = $this->findById($id);
        return $bill->update($request->all());
    }

    public function delete($id)
    {
        $bill = $this->findById($id);
        return $bill->delete();
    }
}
