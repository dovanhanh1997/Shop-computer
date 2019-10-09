<?php


namespace App\Services;


interface ProductServiceInterface extends CRUDServiceInteface
{
    public function getPaginate($number);

    public function findByKey($keySearch);
}
