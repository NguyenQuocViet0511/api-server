<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends BaseApiController
{
    protected $_CategoryService;

    public function __Construct(CategoryService $CategoryService)
    {
        $this->_CategoryService = $CategoryService;
    }
    public function getAll()
    {

        $data = $this->_CategoryService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('category.name')]));

    }

    public function create(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_CategoryService->create($table);
        if ($result) {
            return $this->successResponse($result, __('category.add-success'));
        }
        return $this->successResponse($result, __('category.add-fail'));

    }

    public function update(Request $rq)
    {
        $table = $rq->all();
        $result = $this-> _CategoryService->update($table['id'],$table);
        if ($result) {
            return $this->successResponse($result, __('category.edit-success'));
        }
        return $this->successResponse($result, __('category.edit-fail'));
    }
    public function delete(Request $rq)
    {
        $table = $rq->all();
        $result = $this->_CategoryService->delete($table['id']);
        dd($result);
        if ($result) {
            return $this->successResponse($result, __('category.delete-success'));
        }
        return $this->successResponse($result, __('category.delete-fail'));
    }

    public function show(Request $rq)
    {

        $table = $rq->all();
        $result = $this->_CategoryService->ShowStatus($table['status']);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('Table.name')]));

    }

}
