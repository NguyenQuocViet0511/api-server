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



    public function GetStatus(){

        $data = $this-> model-> where('status','=','No')
        ->get();
        $total = count($data);
        return ['total' => $total, 'data' => $data];
    }

}
