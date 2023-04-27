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

    public function GetByIdCategory(){


        $data = $this-> model -> join('category','category.id','=','food.id_category')
        ->select('food.*','category.name as category_name')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];

    }




}
