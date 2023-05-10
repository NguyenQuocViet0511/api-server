<?php
namespace App\Services;

use App\Repositories\Role\RoleRepositoryInterface;
use App\Services\BaseService;

class RoleService extends BaseService
{
    public function __Construct(RoleRepositoryInterface $RoleRepositoryInterface)
    {
        $this->repo = $RoleRepositoryInterface;
    }

    public function getAll()
    {
        return $this->repo->getAll();
    }
    public function get()
    {
        return $this->repo->get();
    }

    public function getById($id)
    {
        return $this->repo->find($id);
    }
}
