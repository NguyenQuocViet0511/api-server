<?php

namespace App\Repositories\Table;

use App\Models\Table;
use App\Repositories\Table\TableRepositoryInterface;
use App\Repositories\BaseRepository;

class TableRepository extends BaseRepository implements TableRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Table();
    }

    public function getByStatus($status){
        $result = $this -> model -> where('status', $status) -> get();
        if($result){
            return $result;

        }
        return false;



    }



}
