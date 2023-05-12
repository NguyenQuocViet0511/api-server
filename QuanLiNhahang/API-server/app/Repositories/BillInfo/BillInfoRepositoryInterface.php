<?php

namespace App\Repositories\BillInfo;

use App\Repositories\BaseRepositoryInterface;

interface BillInfoRepositoryInterface extends BaseRepositoryInterface
{

    public function GetBillInfo($data);
    public function checkExist($id,$id_bill);
}
