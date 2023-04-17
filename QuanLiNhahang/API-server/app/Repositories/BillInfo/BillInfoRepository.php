<?php

namespace App\Repositories\BillInfo;

use App\Models\BillInfo;
use App\Repositories\Bill\BillInfoRepositoryInterface;
use App\Repositories\BaseRepository;

class BillInfoRepository extends BaseRepository implements BillInfoRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new BillInfo();
    }





}
