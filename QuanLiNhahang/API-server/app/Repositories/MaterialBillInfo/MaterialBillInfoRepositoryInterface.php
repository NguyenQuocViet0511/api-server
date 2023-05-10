<?php

namespace App\Repositories\MaterialBillInfo;

use App\Repositories\BaseRepositoryInterface;

interface MaterialBillInfoRepositoryInterface extends BaseRepositoryInterface
{


    public function GetJoin();
    public function GetById($id);


}
