<?php

namespace App\Repositories\Bill;

use App\Repositories\BaseRepositoryInterface;

interface BillRepositoryInterface extends BaseRepositoryInterface
{

    public function GetBill($id);

    public function checkExist($id);

}
