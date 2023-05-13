<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\MaterialBillService;
use Illuminate\Http\Request;

class MaterialBillController extends BaseApiController
{
    protected $_MaterialBillService;

    public function __Construct(MaterialBillService $MaterialBillService)
    {
        $this->_MaterialBillService = $MaterialBillService;
    }
    public function getAll()
    {

        $data = $this->_MaterialBillService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('bill.name')]));

    }

    public function create(Request $rq)
    {
        $data = $rq->all();
        $result = $this->_MaterialBillService->create($data);
        if ($result) {
            return $this->successResponse($result, __('bill.add-success'));
        }
        return $this->successResponse($result, __('bill.add-fail'));

    }

    public function update(Request $rq)
    {
        $BillInfo = $rq->all();
        $result = $this-> _MaterialBillService->update($BillInfo);
        if ($result) {
            return $this->successResponse( $result, __('billinfo.send-Cook-success'));
        }
        return $this->successResponse( $result, __('billinfo.send-Cook-fail'));
    }
    public function delete(Request $rq)
    {
        $Bill = $rq->all();
        $result = $this->_MaterialBillService->delete($Bill);
        if ($result) {
            return $this->successResponse("", __('bill.delete-success'));
        }
        return $this->successResponse("", __('bill.delete-fail'));
    }

    public function show(Request $rq)
    {

        $data = $rq->all();
        $result = $this->_MaterialBillService->GetBill($data['id_bill']);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('billinfo.name')]));

    }

    public function CreateOrUpdate(Request $rq)
    {
        $data = $rq -> all();
        $result = $this -> _BillInfoService -> CreateOrUpdate($data);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('billinfo.add-success')]));

    }
}
