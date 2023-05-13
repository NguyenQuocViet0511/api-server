<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory;
use App\Repositories\Inventory\InventoryRepositoryInterface;
use App\Repositories\BaseRepository;

class InventoryRepository extends BaseRepository implements InventoryRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Inventory();
    }

    public function checkExist($id){
        $data = $this-> model -> where('id','=',$id) -> first();
        return $data;
    }

    public function GetJoin(){


        $data = $this-> model -> join('material','material.id','=','inventory.id')
        ->select('inventory.*','material.name as name', )
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];

    }

}
