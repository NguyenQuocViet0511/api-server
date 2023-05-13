<?php

namespace App\Repositories\BillInfo;

use App\Repositories\BaseRepositoryInterface;

interface BillInfoRepositoryInterface extends BaseRepositoryInterface
{

    public function GetJoin($data);
    public function checkExist($id,$id_bill);
}
