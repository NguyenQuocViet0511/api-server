<?php

namespace App\Repositories\MaterialBill;

use App\Repositories\BaseRepositoryInterface;

interface MaterialBillRepositoryInterface extends BaseRepositoryInterface
{


    public function GetJoin($id);
    public function GetById($id);
    public function checkExist($id);



}
