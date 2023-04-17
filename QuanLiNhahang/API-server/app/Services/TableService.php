<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\Table\TableRepositoryInterface;
use App\Services\BaseService;
class TableService extends BaseService
{
    public function __Construct(TableRepositoryInterface $tableRepositoryInterface)
    {
            $this-> repo = $tableRepositoryInterface;
    }

    public function getAll()
    {
       return $this -> repo -> getAll();
    }
    public function get()
    {
       return $this -> repo -> get();
    }

    public function getById($id)
    {
       return $this -> repo -> find($id);
    }

    public function create($data = [])
    {
        return $this -> repo -> create($data);
    }

    public function delete($id)
    {
        return $this -> repo -> delete($id);

    }
    public function update($condition = [],$data = [])
    {
        $this -> repo -> update($condition, $data);
    }


}
