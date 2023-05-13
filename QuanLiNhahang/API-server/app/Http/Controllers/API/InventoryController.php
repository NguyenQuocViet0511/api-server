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

    public function update(Request $rq)
    {
        $table = $rq->all();
        $result = $this-> _InventoryService->updateout($table,$table['countout']);
        if ($result) {
            return $this->successResponse($result, __('category.edit-success'));
        }
        return $this->successResponse($result, __('category.edit-fail'));
    }





}
