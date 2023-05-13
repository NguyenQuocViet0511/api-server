<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\HistoryInventoryService;
use Illuminate\Http\Request;

class HistoryInventoryController extends BaseApiController
{
    protected $_HistoryInventoryService;

    public function __Construct(HistoryInventoryService $HistoryInventoryService)
    {
        $this-> _HistoryInventoryService = $HistoryInventoryService;
    }
    public function getAll()
    {

        $data = $this->_HistoryInventoryService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('category.name')]));

    }




}
