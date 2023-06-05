<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\BillService;
use Illuminate\Http\Request;

class BillController extends BaseApiController
{
    protected $_BillService;

    public function __Construct(BillService $BillService)
    {
        $this->_BillService = $BillService;
    }
    public function getAll()
    {

        $data = $this->_BillService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('bill.name')]));

    }

    public function create(Request $rq)
    {
        $Bill = $rq->all();
        $result = $this->_BillService->CreateOut($Bill);
        if ($result) {
            return $this->successResponse($result, __('bill.add-success'));
        }
        return $this->successResponse($result, __('bill.add-fail'));

    }

    public function update(Request $rq)
    {
        $Bill = $rq->all();
        $result = $this-> _BillService->update($Bill);
        if ($result) {
            return $this->successResponse("", __('bill.edit-success'));
        }
        return $this->successResponse("", __('bill.edit-fail'));
    }
    public function delete(Request $rq)
    {
        $Bill = $rq->all();
        $result = $this->_BillService->delete($Bill['id']);
        if ($result) {
            return $this->successResponse("", __('bill.delete-success'));
        }
        return $this->successResponse("", __('bill.delete-fail'));
    }

    public function show(Request $rq)
    {
        $Bill = $rq -> all();
        // $Bill = $rq->all();
        // $result = $this->_BillService->ShowStatus($Bill['status']);
        // return $this->successResponse($result, __('validation.list', ['attribute' => __('bill.name')]));

        $result = $this->_BillService-> GetBill($Bill['id']);
        return $this->successResponse($result, __('bill.name'));

    }
    public function GetBillOut()
    {
        $result = $this->_BillService-> GetBillOut();
        return $this->successResponse($result, __('bill.name'));

    }

    public function GetBillByDate(Request $rq)
    {
        $date = $rq -> all();

        $result = $this->_BillService-> GetBillByDate($date);
        return $this->successResponse($result, __('bill.name'));

    }

    public function GetStartAndEnd(Request $rq)
    {
        $date = $rq -> all();

        $result = $this->_BillService-> GetStartAndEnd($date['start'],$date['end']);
        return $this->successResponse($result, __('bill.name'));

    }
    public function GetToday(Request $rq)
    {
        $date = $rq -> all();

        $result = $this->_BillService-> GetToday('2023-06-05');
        return $this->successResponse($result, __('bill.name'));

    }


}
