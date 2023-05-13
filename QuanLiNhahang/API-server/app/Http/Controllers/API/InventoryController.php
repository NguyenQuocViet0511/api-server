<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\InventoryService;
use Illuminate\Http\Request;

class InventoryController extends BaseApiController
{
    protected $_InventoryService;

    public function __Construct(InventoryService $InventoryService)
    {
        $this-> _InventoryService = $InventoryService;
    }
    public function getAll()
    {

        $data = $this->_InventoryService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('category.name')]));

    }
    public function GetByStatus()
    {

        $data = $this->_InventoryService->GetByStatus();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('category.name')]));

    }

    public function create(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_InventoryService->create($table);
        if ($result) {
            return $this->successResponse($result, __('category.add-success'));
        }
        return $this->successResponse($result, __('category.add-fail'));

    }

    public function update(Request $rq)
    {
        $table = $rq->all();
        $result = $this-> _InventoryService->update($table['id'],$table);
        if ($result) {
            return $this->successResponse($result, __('category.edit-success'));
        }
        return $this->successResponse($result, __('category.edit-fail'));
    }
    public function delete(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_InventoryService->delete($table['id']);
        if ($result) {
            return $this->successResponse($result, __('category.delete-success'));
        }
        return $this->successResponse($result, __('category.delete-fail'));
    }

    public function show(Request $rq)
    {

        $table = $rq->all();
        $result = $this->_InventoryService->ShowStatus($table['status']);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('Table.name')]));

    }

    public function CreateOrUpdate(Request $rq)
    {
        $data = $rq -> all();
        $data['id'] = 'MT000000';
        $data['count'] = '2';
        $result = $this -> _InventoryService -> createOrUpdate($data);

        return $this->successResponse($result, __('validation.list', ['attribute' => __('Table.name')]));

    }
}
