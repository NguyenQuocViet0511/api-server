<?php

namespace App\Repositories\MaterialBill;

use App\Models\MaterialBill;
use App\Repositories\Material\MaterialRepositoryInterface;
use App\Repositories\BaseRepository;

class MaterialBillRepository extends BaseRepository implements MaterialBillRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new MaterialBill();
    }

    public function GetJoin(){


        $data = $this-> model -> join('category','category.id','=','food.id_category')
        ->join('users','users.id','=','food.created_by')
        ->select('food.*','category.name as category','users.name as username','category.status as category_status' )
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];

    }

    public function GetById($id){


       return  $this-> model -> where('id_category',$id) -> get();


    }




}
