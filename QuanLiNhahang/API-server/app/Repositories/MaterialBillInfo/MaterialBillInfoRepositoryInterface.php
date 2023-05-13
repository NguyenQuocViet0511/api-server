<?php

namespace App\Repositories\MaterialBillInfo;

use App\Repositories\BaseRepositoryInterface;

interface MaterialBillInfoRepositoryInterface extends BaseRepositoryInterface
{


    public function GetJoin($id);
    public function GetAllID($data);

    public function checkExist($id,$id_bill);

}
