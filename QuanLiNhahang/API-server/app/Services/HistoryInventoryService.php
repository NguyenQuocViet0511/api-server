<?php

namespace App\Services;

use App\Repositories\HistoryInventory\HistoryInventoryRepositoryInterface;
use App\Repositories\Inventory\InventoryRepositoryInterface;

use App\Services\BaseService;


class HistoryInventoryService extends BaseService
{

    private $_InventoryRepositoryInterface;
    public function __Construct(HistoryInventoryRepositoryInterface $HistoryInventoryRepositoryInterface,
    InventoryRepositoryInterface $InventoryRepositoryInterface)
    {
        $this-> repo = $HistoryInventoryRepositoryInterface;
        $this ->  _InventoryRepositoryInterface = $InventoryRepositoryInterface;
    }

    public function getAll()
    {
        return $this->repo->GetJoin();
    }
    public function GetByStatus(){
        return $this -> repo -> GetByStatus();
    }
    public function get()
    {
        return $this->repo->get();
    }

    public function getById($id)
    {
        return $this->repo->find($id);
    }

    public function create($data = [])
    {
            $result = $this ->  _InventoryRepositoryInterface -> checkExist($data['id_material']);
            $quantityfirst = $result['quantity'] - $data['count'];
            $quantityend = ($result['quantity'] - $data['countout']);
            $inventory = [
                'date'=> date_create(),
                'id_material' => $data['id_material'],
                'quantityfirst' =>  $quantityfirst,
                'quantityin' => $data['count'],
                'quantityout' =>$data['countout'],
                'quantityend' => $quantityend,

            ];
            $this->repo->create($inventory);


    }

    public function delete($id)
    {

        try {
            $this->repo->beginTran();
            $food = $this -> _FoodRepositoryInterface -> GetById($id);
            foreach($food as $item)
            {
                $item -> delete();
            }

            $this->repo->delete($id);

            $this->repo->commitTran();
            return true;

        } catch (\Throwable$th) {

            $this->repo->rollbackTran();

            throw $th;
        }

    }
    public function update($data = [],$count)
    {
        $inventory = $this -> repo->checkExist($data['id']);
        $sum = $inventory['quantity'] - $count;
        $inventory -> update(array('quantity' => $sum));
        return true;
    }



}

