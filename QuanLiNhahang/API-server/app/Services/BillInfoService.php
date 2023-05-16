<?php

namespace App\Services;

use App\Repositories\BillInfo\BillInfoRepositoryInterface;
use App\Repositories\Food\FoodRepositoryInterface;
use App\Repositories\Table\TableRepositoryInterface;
use App\Services\BaseService;
use App\Services\BillService;

class BillInfoService extends BaseService
{

    private $_bill;
    private $_table;
    private $_food;
    public function __Construct(
        BillInfoRepositoryInterface $BillInfoRepositoryInterface,
        BillService $BillService,
        TableRepositoryInterface $TableRepositoryInterface,
        FoodRepositoryInterface $foodRepositoryInterface,

    ) {
        $this->repo = $BillInfoRepositoryInterface;
        $this->_bill = $BillService;
        $this->_table = $TableRepositoryInterface;
        $this->_food = $foodRepositoryInterface;
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

    public function delete($data)
    {

        try {
            $this->repo->beginTran();
            $result = $this->repo->checkExist($data['id'], $data['id_bill']);
            if(empty($result))
            {
                return false;
                $this->repo->commitTran();
            }
            $result -> where('id',$data['id'])->where('id_bill',$data['id_bill'])->where('status','No') -> delete();
            $this->repo->commitTran();
            return true;

        } catch (\Throwable $th) {

            $this->repo->rollbackTran();

            throw $th;
        }

    }
    public function update($data = [])
    {
        try {
            $this->repo->beginTran();
            $result = $this->repo->checkExist($data['id'], $data['id_bill']);
            if(!empty(  $result))
            {
                $result ->where('id_bill',$data['id_bill'])->where('status','No') -> update(array('status' => 'Yes'));
                $this->repo->commitTran();
                return true;
            }
            $this->repo->rollbackTran();
            return false;

            // $this->repo->update($condition, $data);
        } catch (\Throwable $th) {
            return false;
            throw $th;
        }
    }

    public function CreateOrUpdate($data = [])
    {

        try {
            $this->repo->beginTran();
            //check bill exit
            $CheckBill = $this-> _bill->checkExist($data['id_bill']);
            if ($CheckBill) {
                //check billinfo exit
                $result = $this->repo->checkExist($data['id'], $data['id_bill']);
                if (empty($result)) {

                    $price = $this->_food->find($data['id']);
                    $SumCount = ($data['count']);
                    $sum =  $SumCount * $price['price'];
                    $billInfo = [
                        'id' => $data['id'],
                        'id_bill' => $data['id_bill'],
                        'count' =>  $SumCount,
                        'status' => 'No',
                        'note' => $data['note'],
                        'sum' => $sum,
                    ];
                    $this->repo->create($billInfo);
                    $this->repo->commitTran();
                    return true;
                }

                 $price = $this->_food->find($data['id']);
                 $SumCount = ($data['count'] +  $result['count']);
                 $sum =  $SumCount * $price['price'];
                 $result -> where('id',$data['id'])->where('id_bill',$data['id_bill'])->where('status','No') -> update(array('count' => $SumCount,'sum' => $sum));
                 $this->repo->commitTran();
                 return true;

            }
            //new
            $bill = [
                'id' => insertStringID('HD',$this -> _bill -> GetId(),6),
                'timein' => date_create(),
                'discount' => 0,
                'sum' => 0,
                'status' => 'No',
                'id_user' => $data['id_user'],

            ];
            // if create success to insert billinfo
            $result = $this->_bill->create($bill);
            if ($result) {
                $price = $this->_food->find($data['id']);
                $SumCount = ($data['count']);
                $sum =  $SumCount * $price['price'];
                $billInfo = [
                    'id' => $data['id'],
                    'id_bill' => $bill['id'],
                    'count' => $SumCount,
                    'status' => 'No',
                    'note' => $data['note'],
                    'sum' => $sum,
                ];
                $this->repo->create($billInfo);
            }
            // update status table
            $table = [
                'id' => $data['idTable'],
                'status' => 'Yes',
                'id_bill' =>  $bill['id']
            ];
            $this -> _table -> update($table['id'], $table);

            $this->repo->commitTran();
            return true;

        } catch (\Throwable $th) {

            $this->repo->rollbackTran();

            throw $th;
        }

    }

    public function GetBillInfo($id)
    {
        return $this->repo->GetJoin($id);
    }
    public function GetJoinBill($id)
    {
        return $this->repo->GetJoinBill($id);
    }
}
