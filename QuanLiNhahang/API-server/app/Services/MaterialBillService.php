<?php

namespace App\Services;

use App\Repositories\MaterialBill\MaterialBillRepositoryInterface;
use App\Services\BaseService;


class MaterialBillService extends BaseService
{

    public function __Construct(
        MaterialBillRepositoryInterface $MaterialBillRepositoryInterface)
    {
        $this-> repo = $MaterialBillRepositoryInterface;
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
            $getId = $this ->  repo -> getOderById('id','desc',1);
            $bill = [
                'id' => insertStringID('HD',$getId,6),
                'timein' => date_create(),
                'sum' => 0,
                'status' => $data['status'],
                'created_by' => $data['id_user'],

            ];
            $this->repo->create($bill);
            return true;

        } catch (\Throwable$th) {
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
      return  $this -> repo -> GetJoin($id);
    }
    public function checkExist($data)
    {
        return $this -> repo -> checkExist($data);
    }
}
