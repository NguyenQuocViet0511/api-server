<?php

namespace App\Repositories\HistoryInventory;

use App\Repositories\BaseRepositoryInterface;

interface HistoryInventoryRepositoryInterface extends BaseRepositoryInterface
{

    public function checkExist($id);

    public function GetJoin();


}
