<?php

namespace App\Services;

use App\Repositories\MaterialBillInfo\MaterialBillInfoRepositoryInterface;
use App\Repositories\Material\MaterialRepositoryInterface;
use App\Services\BaseService;
use App\Services\MaterialBillService;
use App\Services\InventoryService;


class MaterialBillInfoService extends BaseService
{

    private $_bill;
    private $_material;
    private $_inventory;
    public function __Construct(
        MaterialBillInfoRepositoryInterface $MaterialBillInfoRepositoryInterface,
        MaterialBillService $MaterialBillService,
        MaterialRepositoryInterface $MaterialRepositoryInterface,
        InventoryService $InventoryBillService

    ) {
        $this->repo = $MaterialBillInfoRepositoryInterface;
        $this->_bill = $MaterialBillService;
        $this->_material = $MaterialRepositoryInterface;
        $this -> _inventory = $InventoryBillService;

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
            $result = $this->repo->checkExist($data['id'], $data['id_materialbill']);
            if (empty($result)) {
                return false;
                $this->repo->commitTran();
            }
            $result->where('id', $data['id'])->where('id_materialbill', $data['id_materialbill']) ->delete();
            $all = $this -> repo -> GetAllID($data['id_materialbill']);

            $sumall = 0;
            foreach($all as $item)
            {
                $sumall += $item['sum'];

            }
            $updatebill = $this->_bill-> getById($data['id_materialbill']);

            $updatebill ->  update(array('sum' => $sumall));

            $this->repo->commitTran();
            return true;

        } catch (\Throwable $th) {

            $this->repo->rollbackTran();

            throw $th;
        }

    }


    public function CreateOrUpdate($data = [])
    {

        try {
            $this->repo->beginTran();
            //check bill exit
            // $CheckBill = $this-> _bill->checkExist($data['id_material_bill']);
            // if ($CheckBill) {
            //check billinfo exit
            $result = $this->repo->checkExist($data['id_material'], $data['id_material_bill']);
            if (empty($result)) {

                $price = $this->_material->find($data['id_material']);
                $SumCount = ($data['count']);
                $sum = $SumCount * $price['price'];
                $billInfo = [
                    'id' => $data['id_material'],
                    'id_materialbill' => $data['id_material_bill'],
                    'count' => $SumCount,
                    'sum' => $sum,
                ];
                $this->repo->create($billInfo);

                $all = $this -> repo -> GetAllID($data['id_material_bill']);

                $sumall = 0;
                foreach($all as $item)
                {
                    $sumall += $item['sum'];

                }
                $updatebill = $this->_bill-> getById($data['id_material_bill']);

                $updatebill ->  update(array('sum' => $sumall));

                //inventory
                $this -> _inventory  ->  CreateOrUpdate($data);
                $this->repo->commitTran();
                return true;
            }

            $price = $this->_material->find($data['id_material']);
            $SumCount = ($data['count'] + $result['count']);
            $sum = $SumCount * $price['price'];
            $result->where('id', $data['id_material'])->where('id_materialbill', $data['id_material_bill'])->update(array('count' => $SumCount, 'sum' => $sum));

            $all = $this -> repo -> GetAllID($data['id_material_bill']);
            if(!empty($all))
            {
                $sumall = 0;
                foreach($all as $item)
                {
                    $sumall += $item['sum'];

                }
                $updatebill = $this->_bill-> getById($data['id_material_bill']);

                $updatebill ->  update(array('sum' => $sumall));
            }

            $this -> _inventory  ->  CreateOrUpdate($data);
            $this->repo->commitTran();
            return true;

            // }
            //new
            // $bill = [
            //     'id' => insertStringID('HD',$this -> _bill -> GetId(),6),
            //     'timein' => date_create(),
            //     'sum' => 0,
            //     'status' => $data['status'],
            //     'created_by' => $data['id_user'],

            // ];
            // // if create success to insert billinfo
            // $result = $this->_bill->create($bill);
            // if ($result) {
            //     $price = $this->_material->find($data['id_material']);
            //     $SumCount = ($data['count']);
            //     $sum =  $SumCount * $price['price'];
            //     $billInfo = [
            //         'id' => $data['id_material'],
            //         'id_materialbill' => $bill['id'],
            //         'count' => $SumCount,
            //         'sum' => $sum,
            //     ];
            //     $this->repo->create($billInfo);
            // }
            // // update status table
            // // $table = [
            // //     'id' => $data['idTable'],
            // //     'status' => 'Yes',
            // //     'id_bill' =>  $bill['id']
            // // ];
            // // $this -> _table -> update($table['id'], $table);

            $this->repo->commitTran();
            return true;

        } catch (\Throwable $th) {

            $this->repo->rollbackTran();

            throw $th;
        }

    }

    public function GetBillInfo($data)
    {
        return $this->repo->GetJoin($data);
    }
}
