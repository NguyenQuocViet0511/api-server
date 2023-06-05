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
        return $this->repo-> GetBillEryday();
    }
    public function get()
    {
        return $this->repo->getAll();
    }

    public function getById($id)
    {
        return $this->repo->find($id);
    }

    public function create($data = [])
    {

            $this->repo->create($data);
            return true;

    }
    public function CreateOut($data)
    {
        $getByID = $this ->  repo -> getOderById('id','desc',1);
        $bill = [
            'id' => insertStringID('HD',$getByID,6),
            'timein' => date_create(),
            'discount' => 0,
            'sum' => 0,
            'status' => 'Mang Về',
            'id_user' => $data['id_user'],

        ];
        $this->repo->create($bill);
            return true;
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
        if(!empty($data['id_table']))
        {
            $table = $this -> _table -> find($data['id_table']);
            $table -> update(array('status'=> 'No','id_bill' => NULL));
            $this->repo->commitTran();
            return true;
        }

        $this->repo->commitTran();
        return true;

        }
        catch (\Throwable$th) {

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
    public function GetBillOut()
    {
        return $this -> repo -> GetBillOut();
    }

    public function GetBillByDate($date)
    {
        return $this -> repo -> GetbyDate($date);
    }
    public function GetStartAndEnd($start, $end)
    {
        return $this -> repo -> GetStartAndEnd($start,$end);
    }
    public function GetToday($today)
    {
        return $this -> repo -> GetToday($today);
    }
}
