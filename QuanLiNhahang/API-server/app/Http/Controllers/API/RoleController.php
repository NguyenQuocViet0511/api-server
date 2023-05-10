<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseApiController;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends BaseApiController
{
    protected $_RoleService;

    public function __Construct(RoleService $RoleService)
    {
        $this->_RoleService = $RoleService;
    }
    public function getAll()
    {

        $data = $this->_RoleService-> getAll();
        return $this->successResponse($data, __('validation.list', ['attribute' => __('Role.name')]));

    }
}
