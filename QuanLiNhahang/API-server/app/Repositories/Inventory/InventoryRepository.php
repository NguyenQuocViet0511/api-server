<?php

namespace App\Repositories\Inventory;

use App\Models\Inventory;
use App\Repositories\Inventory\InventoryRepositoryInterface;
use App\Repositories\BaseRepository;

class InventoryRepository extends BaseRepository implements InventoryRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Inventory();
    }





}
