<?php

namespace App\Repositories\Food;

use App\Repositories\BaseRepositoryInterface;

interface FoodRepositoryInterface extends BaseRepositoryInterface
{


    public function GetJoin();
    public function GetById($id);


}
