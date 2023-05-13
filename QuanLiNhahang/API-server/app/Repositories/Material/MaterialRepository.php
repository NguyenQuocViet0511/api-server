<?php

namespace App\Repositories\Material;

use App\Models\Material;
use App\Repositories\Material\MaterialRepositoryInterface;
use App\Repositories\BaseRepository;

class MaterialRepository extends BaseRepository implements MaterialRepositoryInterface
{

    public function __construct()
    {
        $this-> model = new Material();
    }







}
