<?php


namespace App\Repositories\impl;

use App\Admin;
use App\Services\AdminServiceInterface;
use App\Repositories\AdminRepositoryInterface;
use App\Services\BillServiceInterface;
use App\Services\ProductServiceInterface;
use App\Services\UserServiceInterface;
use Spatie\Permission\Models\Role;

class AdminService implements AdminServiceInterface
{
    /**
     * @var UserServiceInterface
     */
    private $userService;
    /**
     * @var ProductServiceInterface
     */
    private $productService;
    /**
     * @var BillServiceInterface
     */
    private $billService;
    /**
     * @var AdminRepositoryInterface
     */
    private $adminRepository;

    public function __construct(UserServiceInterface $userService,
                                ProductServiceInterface $productService,
                                AdminRepositoryInterface $adminRepository,
                                BillServiceInterface $billService)
    {
        $this->userService = $userService;
        $this->productService = $productService;
        $this->billService = $billService;
        $this->adminRepository = $adminRepository;
    }

    public function getAll()
    {
        $user = $this->userService->getAll();
        $product = $this->productService->getAll();
        $bill = $this->billService->getAll();
        return ['USER' => [$user, 'user'],
            'PRODUCT' => [$product, 'product'],
            'BILL' => [$bill, 'bill']];
    }

    public function getAdminRoles()
    {
        $roleData = $this->adminRepository->getRole();
        $idModels = [];
        $idRoles = [];
        foreach ($roleData as $key => $value) {
            array_push($idRoles, $value->role_id);
            array_push($idModels, $value->model_id);
        }

        $admins = $this->getAllAdmin($idModels);
        $roles = $this->getAllRole($idRoles);

        $adminRole = [];
        for ($i = 0; $i < count($admins); $i++) {
            $adminRole[$admins[$i]] = $roles[$i];
        }
        return $adminRole;
    }

    public function getAllAdmin($idModels)
    {
        $admins = [];
        foreach ($idModels as $modelId) {
            $admin = Admin::find($modelId);
            array_push($admins, $admin->name);
        }
        return $admins;
    }

    /**
     * @param array $idRoles
     * @return array
     */
    public function getAllRole(array $idRoles): array
    {
        $roles = [];

        foreach ($idRoles as $id) {
//            dd($id);
            $role = Role::findById($id);
            $roleName = str_replace("_"," ",strtoupper($role->name));
            array_push($roles, [$roleName,$role->objManage]);
        }
        return $roles;
    }
}
