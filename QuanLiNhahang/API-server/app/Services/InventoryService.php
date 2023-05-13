<?php

namespace App\Services;

use App\Repositories\Inventory\InventoryRepositoryInterface;

use App\Services\BaseService;


class InventoryService extends BaseService
{

    public function __Construct(InventoryRepositoryInterface $InventoryRepositoryInterface)
    {
        $this-> repo = $InventoryRepositoryInterface;
    }

    public function getAll()
    {
        return $this->repo->getAll();
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
        $inventory = [
            'id' => $data['id'],
            'quantity' => $data['count']
        ];
            $this->repo->create($inventory);
            return true;

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
    public function update($condition = [], $data = [])
    {
        $this->repo->update($condition, $data);
        return true;
    }





}
