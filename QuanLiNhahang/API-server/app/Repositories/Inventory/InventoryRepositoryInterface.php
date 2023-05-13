<?php

namespace App\Repositories\Inventory;

use App\Repositories\BaseRepositoryInterface;

interface InventoryRepositoryInterface extends BaseRepositoryInterface
{

    public function checkExist($id);

    public function GetJoin();


}
