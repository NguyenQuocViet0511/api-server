<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\MaterialService;
use Illuminate\Http\Request;

class MaterialController extends BaseApiController
{
    protected $_MaterialService;

    public function __Construct(MaterialService $MaterialService)
    {
        $this->_MaterialService = $MaterialService;
    }
    public function getAll()
    {

        $data = $this->_MaterialService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('category.name')]));

    }
    public function GetByStatus()
    {

        $data = $this->_MaterialService->GetByStatus();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('category.name')]));

    }

    public function create(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_MaterialService->create($table);
        if ($result) {
            return $this->successResponse($result, __('category.add-success'));
        }
        return $this->successResponse($result, __('category.add-fail'));

    }

    public function update(Request $rq)
    {
        $table = $rq->all();
        $result = $this-> _MaterialService->update($table['id'],$table);
        if ($result) {
            return $this->successResponse($result, __('category.edit-success'));
        }
        return $this->successResponse($result, __('category.edit-fail'));
    }
    public function delete(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_MaterialService->delete($table['id']);
        if ($result) {
            return $this->successResponse($result, __('category.delete-success'));
        }
        return $this->successResponse($result, __('category.delete-fail'));
    }

    public function show(Request $rq)
    {

        $table = $rq->all();
        $result = $this->_MaterialService->ShowStatus($table['status']);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('Table.name')]));

    }


}
