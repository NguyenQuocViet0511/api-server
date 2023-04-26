<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\FoodService;
use Illuminate\Http\Request;

class FoodController extends BaseApiController
{
    protected $_foodService;

    public function __Construct(FoodService $foodService)
    {
        $this->_foodService = $foodService;
    }
    public function getAll()
    {

        $data = $this->_foodService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('food.name')]));

    }

    public function create(Request $rq)
    {
        $food = $rq->all();
        $food['name'] = "Bò Kho Tàu Hủ";
        $food['price'] = '50000';
        $food['id_category'] = 1;
        $result = $this->_foodService->create($food);
        if ($result) {
            return $this->successResponse("", __('food.add-success'));
        }
        return $this->successResponse("", __('food.add-fail'));

    }

    public function update(Request $rq)
    {
        $food = $rq->all();

        $result = $this-> _foodService->update($food['id'],$food);
        if ($result) {
            return $this->successResponse("", __('food.edit-success'));
        }
        return $this->successResponse("", __('food.edit-fail'));
    }
    public function delete(Request $rq)
    {
        $food = $rq->all();
        $food['id'] = 6;

        $result = $this->_foodService->delete($food['id']);
        if ($result) {
            return $this->successResponse("", __('food.delete-success'));
        }
        return $this->successResponse("", __('food.delete-fail'));
    }

    public function show(Request $rq)
    {

        $table = $rq->all();
        $result = $this->_foodService->ShowStatus($table['status']);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('food.name')]));

    }

}
