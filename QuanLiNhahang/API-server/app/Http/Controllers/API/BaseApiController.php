<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;



class BaseApiController extends Controller
{
    use ApiResponser;

    protected $_service;


    public function get()
    {
        $data = $this->_service->get();
        return $this->successResponse($data);
    }

}
