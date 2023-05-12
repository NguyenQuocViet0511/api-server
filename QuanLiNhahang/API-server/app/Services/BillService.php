<?php

namespace App\Services;

use App\Repositories\Bill\BillRepositoryInterface;
use App\Services\BaseService;
use App\Repositories\Table\TableRepositoryInterface;


class BillService extends BaseService
{
    private $_table;

    public function __Construct(
        BillRepositoryInterface $BillRepositoryInterface,
        TableRepositoryInterface $TableRepositoryInterface)
    {
        $this-> repo = $BillRepositoryInterface;
        $this-> _table = $TableRepositoryInterface;
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
    public function update($data = [])
    {

        try {
        $this->repo->beginTran();
        $bill = $this->repo->find($data['id_bill']);
        if(empty($bill))
        {
            return false;

        }
        $bill -> update(array('status' => 'Yes','sum' => $data['sum'],'timeout' => date_create()));
        $table = $this -> _table -> find($data['id_table']);
        $table -> update(array('status'=> 'No','id_bill' => NULL));
        $this->repo->commitTran();
        return true;
        }
        catch (\Throwable$th) {

            $this->repo->rollbackTran();

            throw $th;
        }
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
