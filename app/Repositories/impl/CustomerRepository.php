<?php


namespace App\Repositories\impl;


use App\Customer;
use App\Repositories\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{

    public function getAll()
    {
        return Customer::all();
    }

    public function create($request)
    {
        return Customer::create($request->all());
    }

    public function findById($id)
    {
        return Customer::find($id);
    }

    public function update($request, $id)
    {
        $customer = $this->findById($id);
        return $customer->update($request->all());
    }

    public function delete($id)
    {
        $customer = $this->findById($id);
        return $customer->delete();
    }
}
