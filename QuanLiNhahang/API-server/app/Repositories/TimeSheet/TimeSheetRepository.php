<?php

namespace App\Repositories\Table;

use App\Models\TimeSheet;
use App\Repositories\TimeSheet\TimeSheetRepositoryInterface;
use App\Repositories\BaseRepository;

class TimeSheetRepository extends BaseRepository implements TimeSheetRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new TimeSheet();
    }

    public function getByStatus($status){
        $result = $this -> model -> where('status', $status) -> get();
        if($result){
            return $result;

        }
        return false;



    }



}
