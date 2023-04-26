<?php

namespace App\Repositories\TimeSheet;

use App\Repositories\BaseRepositoryInterface;

interface TimeSheetRepositoryInterface extends BaseRepositoryInterface
{
    public function getByStatus($status);


}
