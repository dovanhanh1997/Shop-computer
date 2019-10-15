<?php


namespace App\Services;


interface BillServiceInterface extends CRUDServiceInteface
{
    public function findByUserId($id);
}
