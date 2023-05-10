<?php

namespace App\Services;

use App\Repositories\Food\FoodRepositoryInterface;
use App\Services\BaseService;

class FoodService extends BaseService
{
    public function __Construct(FoodRepositoryInterface $foodRepositoryInterface)
    {
        $this->repo = $foodRepositoryInterface;
    }

    public function getAll()
    {
        return $this-> repo->getAll();
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
        try {
            $this->repo->beginTran();
            $getId = $this ->  repo -> getOderById('id','desc',1);
            $data['id'] = insertStringID('FD',$getId,6);
            $data['count'] = 0;
            $this->repo->create($data);
            $this->repo->commitTran();
            return true;

        } catch (\Throwable$th) {
            $this->repo->rollbackTran();
            throw $th;
        }
    }

    public function delete($id)
    {

        try {
            $this->repo->beginTran();
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

    public function GetJoin(){
        return $this -> repo-> GetJoin();
    }


}
