<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\TableService;
use Illuminate\Http\Request;

class TableController extends BaseApiController
{
    protected $_tableService;

    public function __Construct(TableService $tableService)
    {
        $this->_tableService = $tableService;
    }
    public function getAll()
    {

        $data = $this->_tableService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('Table.name')]));

    }

    public function create(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_tableService->create($table);
        if ($result) {
            return $this->successResponse("", __('Table.add-success'));
        }
        return $this->successResponse("", __('Table.add-fail'));

    }
    public function update(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_tableService->update($table);
        if ($result) {
            return $this->successResponse("", __('Table.edit-success'));
        }
        return $this->successResponse("", __('Table.edit-fail'));

    }


    public function updateMoveTable(Request $rq)
    {
        $table = $rq->all();
        $result = $this-> _tableService->updateMoveTable($table);
        if ($result) {
            return $this->successResponse("", __('Table.edit-success'));
        }
        return $this->successResponse("", __('Table.edit-fail'));
    }
    public function delete(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_tableService->delete($table['id']);
        if ($result) {
            return $this->successResponse($result, __('Table.delete-success'));
        }
        return $this->successResponse($result, __('Table.delete-fail'));
    }

    public function show(Request $rq)
    {

        $result = $this->_tableService->GetStatus();
        return $this->successResponse($result, __('validation.list', ['attribute' => __('Table.name')]));

    }

}
