<?php

namespace App\Repositories\Food;

use App\Models\Food;
use App\Repositories\Food\FoodRepositoryInterface;
use App\Repositories\BaseRepository;

class FoodRepository extends BaseRepository implements FoodRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Food();
    }





}
