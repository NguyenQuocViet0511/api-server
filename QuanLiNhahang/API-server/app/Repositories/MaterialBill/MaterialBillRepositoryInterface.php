<?php

namespace App\Repositories\MaterialBill;

use App\Repositories\BaseRepositoryInterface;

interface MaterialBillRepositoryInterface extends BaseRepositoryInterface
{


    public function GetJoin();
    public function GetById($id);


}
