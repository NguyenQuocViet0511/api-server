<?php

namespace App\Repositories\Bill;

use App\Models\Bill;
use App\Repositories\Bill\BillRepositoryInterface;
use App\Repositories\BaseRepository;

class BillRepository extends BaseRepository implements BillRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Bill();
    }





}
