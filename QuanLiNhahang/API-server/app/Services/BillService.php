<?php

namespace App\Services;

use App\Repositories\Bill\BillRepositoryInterface;
use App\Services\BaseService;

class BillService extends BaseService
{
    public function __Construct(BillRepositoryInterface $BillRepositoryInterface)
    {
        $this->repo = $BillRepositoryInterface;
    }

    public function getAll()
    {
        return $this->repo->getAll();
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
            $this->repo->create($data);
            $this->repo->commitTran();
            return true;

        } catch (\Throwable$th) {
            $this->repo->rollbackTran();
            throw $th;
        }
    }

    public function GetId()
    {
        return  $this ->  repo -> getOderById('id','desc',1);

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

    public function GetBill($id)
    {
      return  $this -> repo -> GetBill($id);
    }
    public function checkExist($data)
    {
        return $this -> repo -> checkExist($data);
    }
}
