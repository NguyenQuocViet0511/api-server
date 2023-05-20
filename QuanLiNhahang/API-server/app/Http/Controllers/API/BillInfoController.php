<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\BillInfoService;
use Illuminate\Http\Request;

class BillInfoController extends BaseApiController
{
    protected $_BillInfoService;

    public function __Construct(BillInfoService $BillInfoService)
    {
        $this->_BillInfoService = $BillInfoService;
    }
    public function getAll()
    {

        $data = $this->_BillInfoService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('bill.name')]));

    }

    public function create(Request $rq)
    {
        $Bill = $rq->all();
        // $Bill['idTable'] = 'TB000000';
        // $Bill['status'] = 'No';
        // $Bill['id_food'] = 'FD000000';
        // $Bill['count'] = 1;
        // $Bill['sum'] = 50000;


        $result = $this->_BillInfoService->create($Bill);
        if ($result) {
            return $this->successResponse($result, __('bill.add-success'));
        }
        return $this->successResponse($result, __('bill.add-fail'));

    }

    public function update(Request $rq)
    {
        $BillInfo = $rq->all();
        $result = $this-> _BillInfoService->update($BillInfo);
        if ($result) {
            return $this->successResponse( $result, __('billinfo.send-Cook-success'));
        }
        return $this->successResponse( $result, __('billinfo.send-Cook-fail'));
    }
    public function delete(Request $rq)
    {
        $Bill = $rq->all();
        $result = $this->_BillInfoService->delete($Bill);
        if ($result) {
            return $this->successResponse("", __('bill.delete-success'));
        }
        return $this->successResponse("", __('bill.delete-fail'));
    }

    public function show(Request $rq)
    {

        $data = $rq->all();
        $result = $this->_BillInfoService->GetBillInfo($data);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('billinfo.name')]));

    }

    public function CreateOrUpdate(Request $rq)
    {
        $data = $rq -> all();
        $result = $this -> _BillInfoService -> CreateOrUpdate($data);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('billinfo.add-success')]));

    }

    public function GetJoinBill(Request $rq)
    {
        $data = $rq -> all();
        $result = $this -> _BillInfoService -> GetJoinBill($data);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('billinfo.name')]));

    }
    public function GetBillByID(Request $rq)
    {
        $data = $rq -> all();
        $result = $this -> _BillInfoService -> GetBillByID($data);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('billinfo.name')]));

    }
}
