<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseApiController
{
    protected $_UserService;

    public function __Construct(UserService $UserService)
    {
        $this->_UserService = $UserService;
    }
    public function getAll()
    {

        $data = $this->_UserService->getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('user.name')]));

    }

    public function create(Request $rq)
    {
        $data = $rq->all();
        $result = $this->_UserService->create($data);
        if ($result) {
            return $this->successResponse(  $result, __('user.add-success'));
        }
        return $this->successResponse(  $result, __('user.add-fail'));

    }

    public function update(Request $rq)
    {
        $data = $rq->all();
        $result = $this-> _UserService->update($data['id'],$data);
        if ($result) {
            return $this->successResponse("", __('user.edit-success'));
        }
        return $this->successResponse("", __('user.edit-fail'));
    }
    public function delete(Request $rq)
    {
        $data = $rq->all();
        $result = $this->_UserService->delete($data['id']);
        if ($result) {
            return $this->successResponse($result, __('user.delete-success'));
        }
        return $this->successResponse($result, __('user.delete-fail'));
    }

    public function login(Request $rq)
    {

        $data = $rq->all();
        $result = $this->_UserService->getUserAndRole($data);
        return $this->successResponse($result, __('validation.list', ['attribute' => __('user.name')]));

    }

}
