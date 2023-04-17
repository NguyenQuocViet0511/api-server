<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\TableService;
use App\Http\Controllers\API\BaseApiController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as Input;
use App\Models\Table;
use Symfony\Component\HttpFoundation\Response;




class TableController extends BaseApiController
{
    protected $_tableService;

    public function __Construct(TableService $tableService )
    {
            $this -> _tableService = $tableService;
    }
    public function getAll()
    {

        $data = $this -> _tableService -> getAll();
        return $this->successResponse($data);

    }
    public function create(Request $rq)
    {
            $table = $rq ->all();
            $this -> _tableService ->create($table);
            
            if($table)
            {
                return "Thêm Thành Công";
            }
            else
            {
                return "Thêm Thât Bại Vui lòng Thử Lại";

            }
    }
    public function update(Request $rq)
    {
            $table = $rq ->all();
            $this -> _tableService -> update($table['id'],$table);
            if($table)
            {
                return "Thêm Thành Công";
            }
            else
            {
                return "Thêm Thât Bại Vui lòng Thử Lại";

            }
    }
    public function delete(Request $rq)
    {

            $table = $rq ->all();
            $this -> _tableService -> delete($table['id'],$table);
            if($table)
            {
                return "Thêm Thành Công";
            }
            else
            {
                return "Thêm Thât Bại Vui lòng Thử Lại";

            }
    }
    public function show(Request $rq)
    {


            $table = $rq ->all();
            $this -> _tableService -> delete($table['id'],$table);
            if($table)
            {
                return "Thêm Thành Công";
            }
            else
            {
                return "Thêm Thât Bại Vui lòng Thử Lại";

            }
    }


}

