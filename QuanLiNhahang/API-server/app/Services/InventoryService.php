<?php

namespace App\Services;

use App\Repositories\Inventory\InventoryRepositoryInterface;

use App\Services\BaseService;
use App\Services\HistoryInventoryService;




class InventoryService extends BaseService
{
    private $_HistoryInventoryService;

    public function __Construct(InventoryRepositoryInterface $InventoryRepositoryInterface,
    HistoryInventoryService $HistoryInventoryService)
    {
        $this-> repo = $InventoryRepositoryInterface;
        $this -> _HistoryInventoryService = $HistoryInventoryService;
    }

    public function getAll()
    {
        return $this->repo-> GetJoin();
    }
    public function GetByStatus(){
        return $this -> repo -> GetByStatus();
    }
    public function get()
    {
        return $this->repo->get();
    }

    public function getById($data)
    {
        return $this->repo->checkExist($data);
    }

    public function create($data = [])
    {

    }


    public function update($data = [],$count)
    {
        $inventory = $this -> repo->checkExist($data['id']);
        $sum = $inventory['quantity'] - $count;
        $inventory -> update(array('quantity' => $sum));
        return true;
    }

    public function updateout($data = [],$count)
    {
        try {
        $this->repo->beginTran();
        $inventory = $this -> repo->checkExist($data['id_material']);
        $sum = $inventory['quantity'] - $count;


        $this -> _HistoryInventoryService -> create($data);
        
        $inventory -> update(array('quantity' => $sum));
        $this->repo->commitTran();
        return true;
        }
     catch (\Throwable$th) {

        $this->repo->rollbackTran();

        throw $th;
    }
    }
    public function CreateOrUpdate($data = [])
        {

       try {
        $this->repo->beginTran();

        $inventory = $this -> repo->checkExist($data['id_material']);
        if(empty($inventory))
        {
            $inventory = [
                'id' => $data['id_material'],
                'quantity' => $data['count']
            ];
            $this->repo->create($inventory);
            $this->repo->commitTran();
            return true;


        }
        $sum =  $inventory['quantity'] + $data['count'];
        $inventory -> update(array('quantity' => $sum));
        $this->repo->commitTran();
        return true;

    } catch (\Throwable$th) {

        $this->repo->rollbackTran();

        throw $th;
    }

}
}
