<?php

namespace App\Services;

use App\Repositories\BillInfo\BillInfoRepositoryInterface;
use App\Repositories\Bill\BillRepositoryInterface;
use App\Repositories\Table\TableRepositoryInterface;
use App\Repositories\Food\FoodRepositoryInterface;

use App\Services\BaseService;

class BillInfoService extends BaseService
{

    private $_bill;
    private $_table;
    private $_food;
    public function __Construct(
        BillInfoRepositoryInterface $BillInfoRepositoryInterface,
        BillRepositoryInterface $BillRepositoryInterface,
        TableRepositoryInterface $TableRepositoryInterface,
        FoodRepositoryInterface $foodRepositoryInterface,

    ) {
        $this->repo = $BillInfoRepositoryInterface;
        $this->_bill = $BillRepositoryInterface;
        $this->_table = $TableRepositoryInterface;
        $this -> _food = $foodRepositoryInterface;
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
            // create bill
            $bill = [
                'id' => generateRandomString(),
                'timein' => date_create(),
                'discount' => 0,
                'sum' => 0,
                'status' => $data['status'],
                'id_user' => 1,

            ];
            // if create success to insert billinfo
            $result = $this->_bill->create($bill);
            if ($result) {
                $price = $this -> _food -> find($data['id_food']);
                $sum = $data['count'] *  $price['price'];
                $billInfo = [
                    'id_food' => $data['id_food'],
                    'id_bill' => $bill['id'],
                    'count' => $data['count'],
                    'sum' => $sum,
                ];
                $this->repo->create($billInfo);
            }
            // update status table
            $table = [
                'id' => $data['idTable'],
                'status' => 'Đang Ăn',
                'id_bill' =>  $bill['id']
            ];
            $this -> _table -> update($table['id'], $table);

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
    public function update( $data = [])
    {
        try {

            $resultFind = $this -> repo -> find($data['id_food']);
            if($resultFind)
            {
                return true;

            }
            // $this->repo->update($condition, $data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
