<?php

namespace App\Repositories\HistoryInventory;

use App\Models\HistoryInventory;
use App\Repositories\HistoryInventory\HistoryInventoryRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class HistoryInventoryRepository extends BaseRepository implements HistoryInventoryRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new HistoryInventory();
    }

    public function checkExist($id){
        $data = $this-> model -> where('id_material','=',$id) -> first();
        return $data;
    }

    public function GetJoin(){


        $data = $this-> model -> join('material','material.id','=','historyinventory.id_material')
        ->select('historyinventory.*','material.name as name')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];

    }

    public function Gethistory(){
        $data = $this -> model -> join('material','material.id','=','historyinventory.id_material')
        ->select(DB::raw('id_material,name,SUM(quantityfirst) AS  quantityfirst , SUM(quantityin) AS quantityin,  SUM(quantityout) AS quantityout,  SUM(quantityend) AS quantityend'))
        ->groupBy('name','id_material')
        ->get();
        $total = count($data);
         return ['total' => $total, 'data' => $data];
}

}
