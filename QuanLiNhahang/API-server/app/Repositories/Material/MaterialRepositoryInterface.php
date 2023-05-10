<?php

namespace App\Repositories\Material;

use App\Repositories\BaseRepositoryInterface;

interface MaterialRepositoryInterface extends BaseRepositoryInterface
{


    public function GetJoin();
    public function GetById($id);


}
