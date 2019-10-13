<?php

namespace App\Services;

interface AdminServiceInterface
{
    public function getAll();

    public function getAdminRoles();

    public function getAllAdmin($idModels);

    public function getAllRole(array $idRoles);

    public function getAdminRole();


}
