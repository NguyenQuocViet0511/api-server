<?php

namespace App\Repositories\Role;

use App\Models\Role;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Role();
    }




}
