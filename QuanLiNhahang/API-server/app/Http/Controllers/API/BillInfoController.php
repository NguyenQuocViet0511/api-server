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
        $Bill['idTable'] = 'TB000000';
        $Bill['status'] = 'No';
        $Bill['id_food'] = 'FD000000';
        $Bill['count'] = 1;
        $Bill['sum'] = 50000;


        $result = $this->_BillInfoService->create($Bill);
        dd($result);
        // if ($result) {
        //     return $this->successResponse($result, __('bill.add-success'));
        // }
        // return $this->successResponse($result, __('bill.add-fail'));

    }

    public function update(Request $rq)
    {
        $BillInfo = $rq->all();
        $BillInfo['id_food'] = 1;
        $result = $this-> _BillInfoService->update($BillInfo);
        dd($result);
        // if ($result) {
        //     return $this->successResponse("", __('bill.edit-success'));
        // }
        // return $this->successResponse("", __('bill.edit-fail'));
    }
    public function delete(Request $rq)
    {
        $Bill = $rq->all();
        $result = $this->_BillInfoService->delete($Bill['id']);
        dd($result);
        if ($result) {
            return $this->successResponse("", __('bill.delete-success'));
        }
        return $this->successResponse("", __('bill.delete-fail'));
    }

    public function show(Request $rq)
    {

        $Bill = $rq->all();
        $result = $this->_BillInfoService->ShowStatus($Bill['status']);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('bill.name')]));

    }

}
