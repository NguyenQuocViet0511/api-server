<?php

namespace App\Repositories\Inventory;

use App\Repositories\BaseRepositoryInterface;

interface InventoryRepositoryInterface extends BaseRepositoryInterface
{


    public function GetJoin();
    public function GetById($id);


}
